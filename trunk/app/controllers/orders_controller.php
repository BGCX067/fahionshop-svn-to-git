<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('Order','LineItem');
	var $components = array('Callerservices','Exchanges');
	
	function index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			
			$this->Session->setFlash(__('Ðon hàng lỗi', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('order', $this->Order->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Order->create();
			if ($this->Order->save($this->data)) {
			$this->Session->setFlash(__('Đơn hàng đã được lưu', true));
				
				
			$this->redirect(array('action' => 'index'));
			} else {
				
				$this->Session->setFlash(__('Đơn hàng không lưu được. Thử lại!', true));
				
			}
		}
		$users = $this->Order->User->find('list');
		$shippingMethods = $this->Order->ShippingMethod->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$provinces = $this->Order->Province->find('list');
		$this->set(compact('users', 'shippingMethods', 'paymentMethods', 'provinces'));
	}
	function payment_address()
	{
		
			if(isset($this->passedArgs['resend'])){
				$this->set('send',true);
			}
		$users = $this->Order->User->find('list');
		//add country
		$provinces = $this->Order->Province->find('list');
		$this->set(compact('users', 'provinces'));
	
	}
	function checkout(){
	if(isset($this->passedArgs['sent'])){
			$this->set('sent_method',true);
		}
	if (!empty($this->data['Order']['payment_address'])) {
			
			$this->set('address',$this->data);
			
		}
		$users = $this->Order->User->find('list');
		$shippingMethods = $this->Order->ShippingMethod->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		
		$this->set(compact('users', 'shippingMethods', 'paymentMethods'));
		
		
			
	}
	/*
	1.Xac nhan thanh toan
	2.Sau khi hoan tat, luu data vao 2 table Order,LineItem
	3.Doc session gio hang luu thong tin san pham vao bang LineItem
	4.xu ly xoa session va select phuong thuc thanh toan
	*/
	function check_end(){
		if (!empty($this->data['Order']['checkout'])) {
		
		//ghi du lieu len session
			$order_session=array();
			if(!empty($this->data)){
				$order_session = array('name'=> $this->data['Order']['name'], 'country' =>$this->data['Order']['country'],'province_id'=>$this->data['Order']['province_id'],
				'address'=>$this->data['Order']['address'],'phone'=>$this->data['Order']['phone'],'email'=>$this->data['Order']['email'],'re_name'=>$this->data['Order']['re_name'],
				're_country'=>$this->data['Order']['re_country'],'re_city'=>$this->data['Order']['re_city'],'re_address'=>$this->data['Order']['re_address'],
				're_phone'=>$this->data['Order']['re_phone'],'shipping_method_id'=>$this->data['Order']['shipping_method_id'],
				'payment_method_id'=>$this->data['Order']['payment_method_id'],'comments'=>$this->data['Order']['comments']);
				
				$this->Session->write('order_session',$order_session);
			}
			//die();
			$this->set('address_payment',$this->data);
		}
		//da xac nhan thanh toan
	
			//var_dump($this->data);
		if (!empty($this->data['Order']['check_end'])) {
						//Don hang chua thuc hien
						$this->data['Order']['active']= 0;
						$this->Order->create();
						$this->Order->save($this->data);
						$newOrderId = $this->Order->id;
						$this->Session->write('Order_id',$newOrderId);
						//doc session gio hang
						$curItem = $this->Session->read('items');
						$price=0;
						if(isset($curItem)){
						foreach($curItem as $item){
								if ($item['quantity']>0){
									$product = $this->requestAction("/products/show/{$item['id']}");
											if(($product['Product']['special_price'])>0){
												$price=$product['Product']['special_price'];
											}
											else{
												$price=$product['Product']['price'];
											}
										$line_item=array();
										$line_item=array('order_id'=>$newOrderId,'product_id'=>$item['id'],'quantity'=>$item['quantity'],'price'=>$price);
										$this->LineItem->Create();
										$this->LineItem->save($line_item);
								}
							}	
						}
					
					if($this->data['Order']['payment_method_id'] == '4'){
					//Paypal
						$this->redirect(array('action' => 'payment_paypal'));
					}
					else if($this->data['Order']['payment_method_id'] == '5'){
					//Ngan luong
						$this->redirect(array('action' => 'payment_nganluong'));
					}
				else{ 
					//Thanh toan truc tiep
					
					$this->Session->destroy();
					$this->redirect(array('action' => 'process_direct'));
				}
			}
		}
		function payment_paypal(){
		
		$bb=$this->Session->read('Order_id');
		$this->set('set_order_by_id',$this->Order->read(null,$bb));
		// Neu cancel paypal ->
		if(isset($this->passedArgs['tham'])){
			$this->Session->delete('items');
			$this->Session->delete('order_session');
			$this->Session->delete('Order_id');
			$this->redirect(array('controller'=>'products','action' => 'recent'));
			
		}
		if(isset($_REQUEST['token']))
			$token = $_REQUEST['token'];
			
		if(!isset($token)) {
			$this->set('step',1);
			$serverName = $_SERVER['SERVER_NAME'];
			$serverPort = $_SERVER['SERVER_PORT'];
			$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
			
			if (!empty($this->data['currencyCodeType'])){
				$currencyCodeType=$this->data['currencyCodeType'];
				//$L_NAME0=$this->data['$L_NAME0'];
				//var_dump($this->data);
				//die();
			
				$paymentType="Sale";
				$returnURL =urlencode($url.'/payment_paypal/currencyCodeType:'.$currencyCodeType.'/paymentType:'.$paymentType);
				$cancelURL =urlencode("$url/payment_paypal/tham:true");
				
				
				
				$personName        = 'PERSONNAME';
				$SHIPTOSTREET      = 'SHIPTOSTREET';
				$SHIPTOCITY        = 'SHIPTOCITY';
				$SHIPTOSTATE	   = 'SHIPTOSTATE';
				$SHIPTOCOUNTRYCODE = 'SHIPTOCOUNTRYCODE';
				$SHIPTOZIP         = 'SHIPTOZIP';
				//lam the nao doc gio hang 
				$curItem = $this->Session->read('items');
				//$itemamt = 0;
				$i=0;
					if(isset($curItem)){
						foreach($curItem as $item){
								if($item['quantity'] > 0){
						
								$product = $this->requestAction("/products/show/{$item['id']}");
									if(($product['Product']['special_price'])>0){
										//$itemamt = $itemamt + $item['quantity']*$product['Product']['special_price'];
								
										${'L_AMT'.$i}=$this->Exchanges->change($product['Product']['special_price']);
									}
									else{
										//$itemamt = $itemamt + $item['quantity']*$product['Product']['price'];
										${'L_AMT'.$i}=$this->Exchanges->change($product['Product']['price']);
									}
									
								${'L_NAME'.$i}=$product['Product']['name'];
								${'L_QTY'.$i}=$item['quantity'];
								$i++;
							}
						}	
					}
				//L_AMT : gia cua san pham
				//L_NAME : Ten cua san pham
				//L_QTY :  so luong cua san pham
				//$itemamt: tong tien (chua tinh phi)
				
				$itemamt = 0.00;
				$NAME='';
				$AMTT='';
				$QTY='';
				$n=0;
				//$SHIPDISCAMT =-3.00;
				$shipdiscamt =-3.00;
				//$n=$i;
				while($n<$i){
					$NAME = $NAME.'&L_NAME'.$n.'='.${'L_NAME'.$n};
					$AMTT = $AMTT.'&L_AMT'.$n.'='.${'L_AMT'.$n};
					$QTY = $QTY.'&L_QTY'.$n.'='.${'L_QTY'.$n};
					$itemamt = $itemamt+${'L_QTY'.$n}*${'L_AMT'.$n};
					$n = $n +1;
				}
				//amount = itemamount+ shippingamt+shippingdisc+taxamt+insuranceamount; 
				//taxamt=2.00,shippingamt = 8.00 or 3.00,shippingdisc= -3.00,insuranceamount =1.00,itemamount = total(chua phi)
				//double amt = System.Math.Round( ft + 5.00f + 2.00f + 1.00f, 2);
				$amt = 5.00+2.00+1.00+$itemamt;
				   // string amtstr = String.Format("Float double maxamt = System.Math.Round(amt + 25.00f, 2);         
				$maxamt= $amt+25.00;
				$shiptoAddress = "&SHIPTONAME=$personName&SHIPTOSTREET=$SHIPTOSTREET&SHIPTOCITY=$SHIPTOCITY&SHIPTOSTATE=$SHIPTOSTATE&SHIPTOCOUNTRYCODE=$SHIPTOCOUNTRYCODE&SHIPTOZIP=$SHIPTOZIP";
				$nvpstr="&ADDRESSOVERRIDE=1$shiptoAddress".$NAME.$AMTT.$QTY."&MAXAMT=".(string)$maxamt."&AMT=".(string)$amt."&ITEMAMT=".(string)$itemamt."&SHIPDISCAMT=".(string)$shipdiscamt."&CALLBACKTIMEOUT=4&L_SHIPPINGOPTIONAMOUNT1=8.00&L_SHIPPINGOPTIONlABEL1=UPS Next Day Air&L_SHIPPINGOPTIONNAME1=UPS Air&L_SHIPPINGOPTIONISDEFAULT1=true&L_SHIPPINGOPTIONAMOUNT0=3.00&L_SHIPPINGOPTIONLABEL0=UPS Ground 7 Days&L_SHIPPINGOPTIONNAME0=Ground&L_SHIPPINGOPTIONISDEFAULT0=false&INSURANCEAMT=1.00&INSURANCEOPTIONOFFERED=true&CALLBACK=https://www.ppcallback.com/callback.pl&SHIPPINGAMT=8.00&SHIPDISCAMT=-3.00&TAXAMT=2.00&L_NUMBER0=1000&L_DESC0=Size: 8.8-oz&L_NUMBER1=10001&L_DESC1=Size: Two 24-piece boxes&L_ITEMWEIGHTVALUE1=0.5&L_ITEMWEIGHTUNIT1=lbs&ReturnUrl=".$returnURL."&CANCELURL=".$cancelURL ."&CURRENCYCODE=".$currencyCodeType."&PAYMENTACTION=".$paymentType;
				//$nvpstr="&ADDRESSOVERRIDE=1$shiptoAddress&L_NAME0=".$L_NAME0."&L_NAME1=".$L_NAME1."&L_AMT0=".$L_AMT0."&L_AMT1=".$L_AMT1."&L_QTY0=".$L_QTY0."&L_QTY1=".$L_QTY1."&MAXAMT=".(string)$maxamt."&AMT=".(string)$amt."&ITEMAMT=".(string)$itemamt."&CALLBACKTIMEOUT=4&L_SHIPPINGOPTIONAMOUNT1=8.00&L_SHIPPINGOPTIONlABEL1=UPS Next Day Air&L_SHIPPINGOPTIONNAME1=UPS Air&L_SHIPPINGOPTIONISDEFAULT1=true&L_SHIPPINGOPTIONAMOUNT0=3.00&L_SHIPPINGOPTIONLABEL0=UPS Ground 7 Days&L_SHIPPINGOPTIONNAME0=Ground&L_SHIPPINGOPTIONISDEFAULT0=false&INSURANCEAMT=1.00&INSURANCEOPTIONOFFERED=true&CALLBACK=https://www.ppcallback.com/callback.pl&SHIPPINGAMT=8.00&SHIPDISCAMT=-3.00&TAXAMT=2.00&L_NUMBER0=1000&L_DESC0=Size: 8.8-oz&L_NUMBER1=10001&L_DESC1=Size: Two 24-piece boxes&L_ITEMWEIGHTVALUE1=0.5&L_ITEMWEIGHTUNIT1=lbs&ReturnUrl=".$returnURL."&CANCELURL=".$cancelURL ."&CURRENCYCODE=".$currencyCodeType."&PAYMENTACTION=".$paymentType;
				
			   
				//$nvpstr = $nvpHeader.$nvpstr;
				/* Make the call to PayPal to set the Express Checkout token
				If the API call succeded, then redirect the buyer to PayPal
				to begin to authorize payment.  If an error occured, show the
				resulting errors
				*/
				$resArray=$this->Callerservices->hash_call("SetExpressCheckout",$nvpstr);
				$_SESSION['reshash']=$resArray;

				$ack = strtoupper($resArray["ACK"]);

				if($ack=="SUCCESS"){
					// Redirect to paypal.com here
					$token = urldecode($resArray["TOKEN"]);
					$payPalURL = PAYPAL_URL.$token;
					header("Location: ".$payPalURL);
				} else  {
				 //Redirecting to APIError.php to display errors.
					//$location = "APIError.php";
					//header("Location: $location");
					 $this->Session->setFlash("The PayPal API has returned an error!");
				}
			}
		}else{
			$this->set('step',3);
			/* At this point, the buyer has completed in authorizing payment
			at PayPal.  The script will now call PayPal with the details
			of the authorization, incuding any shipping information of the
			buyer.  Remember, the authorization is not a completed transaction
			at this state - the buyer still needs an additional step to finalize
			the transaction
			*/
			$token =urlencode( $_REQUEST['token']);

			/* Build a second API request to PayPal, using the token as the
			ID to get the details on the payment authorization
			*/
			$nvpstr="&TOKEN=".$token;

			//$nvpstr = $nvpHeader.$nvpstr;
			/* Make the API call and store the results in an array.  If the
			call was a success, show the authorization details, and provide
			an action to complete the payment.  If failed, show the error
			*/
			$resArray=$this->Callerservices->hash_call("GetExpressCheckoutDetails",$nvpstr);
			$_SESSION['reshash']=$resArray;
			$ack = strtoupper($resArray["ACK"]);
			if($ack == 'SUCCESS' || $ack == 'SUCCESSWITHWARNING'){
				$_SESSION['token']=$_REQUEST['token'];
				$_SESSION['payer_id'] = $_REQUEST['PayerID'];

				//$_SESSION['paymentAmount']=$this->passedArgs['paymentAmount'];
				$_SESSION['currCodeType']=$this->passedArgs['currencyCodeType'];
				$_SESSION['paymentType']=$this->passedArgs['paymentType'];

				$resArray=$_SESSION['reshash'];
				$_SESSION['TotalAmount']= $resArray['AMT'] + $resArray['SHIPDISCAMT'];
				$this->set('resArray',$resArray);
				//require_once "GetExpressCheckoutDetails.php";
			}else{
				//Redirecting to APIError.php to display errors.
				//$location = "APIError.php";
				//header("Location: $location");
				$this->Session->setFlash("The PayPal API has returned an error!");
			}
		}
		if (!empty($this->data['dopayment'])){
		
			ini_set('session.bug_compat_42',0);
			ini_set('session.bug_compat_warn',0);

			/* Gather the information to make the final call to
			   finalize the PayPal payment.  The variable nvpstr
			   holds the name value pairs
			   */
			$token =urlencode( $_SESSION['token']);
			$paymentAmount =urlencode ($_SESSION['TotalAmount']);
			$paymentType = urlencode($_SESSION['paymentType']);
			$currCodeType = urlencode($_SESSION['currCodeType']);
			$payerID = urlencode($_SESSION['payer_id']);
			$serverName = urlencode($_SERVER['SERVER_NAME']);

			$nvpstr='&TOKEN='.$token.'&PAYERID='.$payerID.'&PAYMENTACTION='.$paymentType.'&AMT='.$paymentAmount.'&CURRENCYCODE='.$currCodeType.'&IPADDRESS='.$serverName ;
			 /* Make the call to PayPal to finalize payment
				If an error occured, show the resulting errors
				*/
			$resArray=$this->Callerservices->hash_call("DoExpressCheckoutPayment",$nvpstr);

			/* Display the API response back to the browser.
			   If the response from PayPal was a success, display the response parameters'
			   If the response was an error, display the errors received using APIError.php.
			   */
			$ack = strtoupper($resArray["ACK"]);
			if($ack != 'SUCCESS' && $ack != 'SUCCESSWITHWARNING'){
				$this->Session->setFlash("The PayPal API has returned an error!");
			}else{
				$this->set('step',4);
						
			//Don hang da thuc hien set len 1.
							$this->data['Order']['id']=$bb;
							$this->data['Order']['active'] =1;
							$this->Order->save($this->data);
			//update lai so luong san pham
						$curItem = $this->Session->read('items');
						if(isset($curItem)){
							foreach($curItem as $item){
								if ($item['quantity']>0){
									$id =$item['id'];
									$sl_sell = $item['quantity'];
									
									$this->requestAction("/products/save_product_sale/".$item['id']."/".$item['quantity']);		
								}
							}
						}
			
			//xoa session
							$this->Session->destroy();
			}
		}
	}
//thanh toan truc tiep xong xuoi
	
		function process_direct(){
				}
		function payment_nganluong(){
			$nl=$this->Session->read('Order_id');
			$this->set('set_order_by_id',$this->Order->read(null,$nl));
			
			$serverName = $_SERVER['SERVER_NAME'];
			$serverPort = $_SERVER['SERVER_PORT'];
			$url=dirname('http://'.$serverName.':'.$serverPort.$_SERVER['REQUEST_URI']);
			$returnURL=urlencode("$url/payment_nganluong");
			$this->set(returnURL,$returnURL);
		
		}
		
		function edit($id = null) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid order', true));
				$this->redirect(array('action' => 'index'));
				
			}
			if (!empty($this->data)) {
					if ($this->Order->save($this->data)) {
						$this->Session->setFlash(__('The order has been saved', true));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
					}
			}
				if (empty($this->data)) {
					$this->data = $this->Order->read(null, $id);
				}
				$users = $this->Order->User->find('list');
				$shippingMethods = $this->Order->ShippingMethod->find('list');
				$paymentMethods = $this->Order->PaymentMethod->find('list');
				$provinces = $this->Order->Province->find('list');
				$this->set(compact('users', 'shippingMethods', 'paymentMethods', 'provinces'));
		}
		
		function delete($id = null) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for order', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Order->delete($id)) {
				$this->Session->setFlash(__('Order deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Order was not deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		
		
		function admin_index() {
			$this->layout = 'admin';
			$this->Order->recursive = 0;
			$this->set('orders', $this->paginate());
		}
	
		function admin_view($id = null) {
			$this->layout = 'admin';
			if (!$id) {
			$this->redirect(array('action' => 'index'));
		
			}
		
			
			$this->set('order', $this->Order->read(null, $id));
			$this->set('list_products_by_order_id',$this->Order->LineItem->find('all',array(
			'conditions' => array(
				'LineItem.order_id' =>  $id
	
			)
		)));
		
	}
		function group($id = null) {
			
			$this->layout = 'admin';
			if (!$id) {
			$this->redirect(array('action' => 'index'));
			}
			$this->set('orders', $this->Order->read(null, $id));
			$this->set('list_products_by_order_id',$this->Order->LineItem->find('all',array(
			'conditions' => array(
				'LineItem.order_id' =>  $id
	
			)
		)));
		$tau=$this->Order->LineItem->find('all',array('conditions' => array('LineItem.order_id' => $id)));
		
			
		return $tau;
	}
	
		function admin_add() {
			$this->layout = 'admin';
			if (!empty($this->data)) {
				$this->Order->create();
				if ($this->Order->save($this->data)) {
					$this->Session->setFlash(__('Tạo mới thành công!', true));
					$this->redirect(array('action' => 'index'));
				}
				else{
				$this->Session->setFlash(__(' Tạo mới không thành công. Thử lại!', true));
				}
			}
			$users = $this->Order->User->find('list');
			$shippingMethods = $this->Order->ShippingMethod->find('list');
			$paymentMethods = $this->Order->PaymentMethod->find('list');
			$provinces = $this->Order->Province->find('list');
			$this->set(compact('users', 'shippingMethods', 'paymentMethods', 'provinces'));
		}
			function admin_edit($id = null) {
			$this->layout='admin';
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Lỗi!', true));
				$this->redirect(array('action' => 'index'));
		
				}
			if (!empty($this->data)) {
				if ($this->Order->save($this->data)) {
					$this->Session->setFlash(__('Cập nhật thành công', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Cập nhật không thành công. Thử lại.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Order->read(null, $id);
			}
			$users = $this->Order->User->find('list');
			$shippingMethods = $this->Order->ShippingMethod->find('list');
			$paymentMethods = $this->Order->PaymentMethod->find('list');
			$provinces = $this->Order->Province->find('list');
			$this->set(compact('users', 'shippingMethods', 'paymentMethods', 'provinces'));
			//$countries = $this->Order->Country->find('list');
			$this->set(compact('users', 'shippingMethods', 'paymentMethods', 'countries'));
		}
	
			function admin_delete($id = null) {
			if (!$id) {
		
			$this->Session->setFlash(__('Lỗi', true));
		
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Order->delete($id)) {
				$this->Session->setFlash(__('Đơn hàng đã được xóa.', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Không xóa được. Thử lại!', true));
			$this->redirect(array('action' => 'index'));
			}
		function admin_active($id = null){
				if (!$id) {
				$this->Session->setFlash(__('Invalid id for order', true));
				$this->redirect(array('action'=>'index'));
				}
				$this->data['Order']['id'] = $id;
				$this->data['Order']['active'] = 0;
				//var_dump($this->data);
				//die();
				if ($this->Order->save($this->data)) {
					$this->Session->setFlash(__('Đơn hàng đang thực hiện!', true));
					$this->redirect(array('action'=>'index'));
				}
				$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
				$this->redirect(array('action' => 'index'));
			}
						
		function admin_unactive($id = null){
			if (!$id) {
			$this->Session->setFlash(__('Invalid id for order', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Order']['id'] = $id;
		$this->data['Order']['active'] = 1;
		
		$get_order = $this->Order->read(null,$id);
		//kiem tra dieu kien 
		/*1. Kiem tra trong bang Order, neu chon phuong thuc thanh toan truc tiep, sau khi dc kich hoat len
		ta tien update lai sl =sl hien tai - sl ban di cho moi san pham.
		*/
		//Neu phuong thuc thanh toan truc tiep co payment_method _id =6
		if ($get_order['Order']['payment_method_id'] == '6')
		{
			$vien=$this->Order->LineItem->find('all',array('conditions' => array('LineItem.order_id' => $id)));
			foreach($vien as $viet){
			 $id_pro = $viet['LineItem']['product_id'];
			 $quantity_sale =$viet['LineItem']['quantity'];
			 $this->requestAction("/products/save_product_sale/".$id_pro."/".$quantity_sale);
			}
			
		}
		
		//var_dump($vien);
		
		//die();
		if ($this->Order->save($this->data)) {
			$this->Session->setFlash(__('Trạng thái được kích hoạt ', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trạng thái cập nhật thất bại', true));
		$this->redirect(array('action' => 'index'));
		
	}
	
	
}