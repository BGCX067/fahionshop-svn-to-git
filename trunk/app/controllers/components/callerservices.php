<?php
/**
 * Caller Services component by daiun.
 * Uses for Payment with Paypal
 *
 * 
 *
 * PHP versions 4 and 5
 *
**/
//require_once 'constants.php';
	define('USE_PROXY',FALSE);
	define('PROXY_HOST', '127.0.0.1');
	define('PROXY_PORT', '808');	
	define('PAYPAL_URL', 'https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&token=');
	define('ACK_SUCCESS', 'SUCCESS');
	define('ACK_SUCCESS_WITH_WARNING', 'SUCCESSWITHWARNING');
	
class CallerservicesComponent extends Object {

	var $API_UserName = 'thambe_1304476104_biz_api1.gmail.com';

	var $API_Password = '1304476119';

	var $API_Signature = 'ALxUbeX.gdZTaJvNQ5wG-pzU2.tpAj5-glpG75qf0YHMmdn1cn4Xf3gS';

	var $API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";

	var $version= '65.1';

	var $subject = '';
	// below three are needed if used permissioning
	
	function nvpHeader(){
		global $nvp_Header, $AUTH_token,$AUTH_signature,$AUTH_timestamp;
		$nvpHeaderStr = "";

		if(defined('AUTH_MODE')) {
			//$AuthMode = "3TOKEN"; //Merchant's API 3-TOKEN Credential is required to make API Call.
			//$AuthMode = "FIRSTPARTY"; //Only merchant Email is required to make EC Calls.
			//$AuthMode = "THIRDPARTY";Partner's API Credential and Merchant Email as Subject are required.
			$AuthMode = "AUTH_MODE"; 
		}else{
			
			if((!empty($this->API_UserName)) && (!empty($this->API_Password)) && (!empty($this->API_Signature)) && (!empty($this->subject))) {
				$AuthMode = "THIRDPARTY";
			}
			
			else if((!empty($this->API_UserName)) && (!empty($this->API_Password)) && (!empty($this->API_Signature))) {
				$AuthMode = "3TOKEN";
			}
			
			elseif (!empty($AUTH_token) && !empty($AUTH_signature) && !empty($AUTH_timestamp)) {
				$AuthMode = "PERMISSION";
			}
			elseif(!empty($this->subject)) {
				$AuthMode = "FIRSTPARTY";
			}
		}
		switch($AuthMode) {
			
			case "3TOKEN" : 
					$nvpHeaderStr = "&PWD=".urlencode($this->API_Password)."&USER=".urlencode($this->API_UserName)."&SIGNATURE=".urlencode($this->API_Signature);
					break;
			case "FIRSTPARTY" :
					$nvpHeaderStr = "&SUBJECT=".urlencode($this->subject);
					break;
			case "THIRDPARTY" :
					$nvpHeaderStr = "&PWD=".urlencode($this->API_Password)."&USER=".urlencode($this->API_UserName)."&SIGNATURE=".urlencode($this->API_Signature)."&SUBJECT=".urlencode($this->subject);
					break;		
			case "PERMISSION" :
					$nvpHeaderStr = formAutorization($AUTH_token,$AUTH_signature,$AUTH_timestamp);
					break;
		}
		return $nvpHeaderStr;
	}

	/**
	  * hash_call: Function to perform the API call to PayPal using API signature
	  * @methodName is name of API  method.
	  * @nvpStr is nvp string.
	  * returns an associtive array containing the response from the server.
	*/


	function hash_call($methodName,$nvpStr){
		//declaring of global variables
		global $nvp_Header, $AUTH_token,$AUTH_signature,$AUTH_timestamp;
		// form header string
		$nvpheader=$this->nvpHeader();
		//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		//in case of permission APIs send headers as HTTPheders
		if(!empty($AUTH_token) && !empty($AUTH_signature) && !empty($AUTH_timestamp))
		 {
			$headers_array[] = "X-PP-AUTHORIZATION: ".$nvpheader;
	  
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_array);
		curl_setopt($ch, CURLOPT_HEADER, false);
		}
		else 
		{
			$nvpStr=$nvpheader.$nvpStr;
		}
		//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
	   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
		if(USE_PROXY)
		curl_setopt ($ch, CURLOPT_PROXY, PROXY_HOST.":".PROXY_PORT); 

		//check if version is included in $nvpStr else include the version.
		if(strlen(str_replace('VERSION=', '', strtoupper($nvpStr))) == strlen($nvpStr)) {
			$nvpStr = "&VERSION=" . urlencode($this->version) . $nvpStr;	
		}
		
		$nvpreq="METHOD=".urlencode($methodName).$nvpStr;
		
		//setting the nvpreq as POST FIELD to curl
		curl_setopt($ch,CURLOPT_POSTFIELDS,$nvpreq);

		//getting response from server
		$response = curl_exec($ch);

		//convrting NVPResponse to an Associative Array
		$nvpResArray=$this->deformatNVP($response);
		$nvpReqArray=$this->deformatNVP($nvpreq);
		$_SESSION['nvpReqArray']=$nvpReqArray;

		if (curl_errno($ch)) {
			// moving to display page to display curl errors
			  $_SESSION['curl_error_no']=curl_errno($ch) ;
			  $_SESSION['curl_error_msg']=curl_error($ch);
			  $location = "APIError.php";
			  header("Location: $location");
		 } else {
			 //closing the curl
				curl_close($ch);
		  }

		return $nvpResArray;
	}

	/** This function will take NVPString and convert it to an Associative Array and it will decode the response.
	  * It is usefull to search for a particular key and displaying arrays.
	  * @nvpstr is NVPString.
	  * @nvpArray is Associative Array.
	  */

	function deformatNVP($nvpstr){

		$intial=0;
		$nvpArray = array();


		while(strlen($nvpstr)){
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
		 }
		return $nvpArray;
	}
	function formAutorization($auth_token,$auth_signature,$auth_timestamp){
		$authString="token=".$auth_token.",signature=".$auth_signature.",timestamp=".$auth_timestamp ;
		return $authString;
	}
}
?>
