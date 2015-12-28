<div id="content">
<?php //var_dump($orders);
//die();
?>
<h1 class="status-1">Đơn hàng</h1>
<?php echo $this->Session->flash();?>
<form action="" method="post" >
<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" />Danh sách các đơn hàng hiện có</div>
<fieldset style="display: none;"><input type="hidden" value="POST" name="_method"></fieldset>
<table cellspacing="0" id="products">
    <thead>
        <tr>			
			<th><?php echo $this->Paginator->sort('Mã đơn hàng');?></th>
			<th><?php echo $this->Paginator->sort('Tên chủ đơn hàng');?></th>			
			<th><?php echo $this->Paginator->sort('Trạng thái');?></th>
			<th><?php echo $this->Paginator->sort('Số lượng');?></th>
			<th><?php echo $this->Paginator->sort('Tổng tiền');?></th>		
			<th class="actions"><?php __('Thao tác');?></th>
        </tr>
    </thead>
	
    <tbody>
<?php
	$i = 0;
	foreach ($orders as $order):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $order['Order']['id']; ?>&nbsp;</td>
		<?php 
			$get_product=$this->requestAction("/orders/group/{$order['Order']['id']}");
		//$this->set('jjhjhjh'.$q,$get_product);
		//var_dump( $get_product);
		//die;
		
		$sl=0;
		$tong=0;
		
		if (!empty($get_product)){
			foreach ($get_product as $apart) {
				
				$sl=$sl+$apart['LineItem']['quantity'];
				$tong=$tong+($apart['LineItem']['price']*$apart['LineItem']['quantity']);
			}
		}
		else
		{
			$sl=0;
			$tong=0;
		}
		?>
		
		
		<td><?php echo $order['Order']['name']; ?>&nbsp;</td>
		<td><?php
			if ($order['Order']['active'] == 1){
			echo $this->Html->link(__('', true), array('action' => 'active', $order['Order']['id']),array('class'=>'active','label'=>'','title'=>'đơn hàng đã thực hiện.'));
				}
			else
				echo $this->Html->link(__('', true), array('action' => 'unactive', $order['Order']['id']),array('class'=>'unactive','label'=>'','title'=>'đơn hàng đang thực hiện.'));
		?>&nbsp;
		</td>
		
		<td><?php echo $sl ;?></td>
		<td><?php echo $price->currency($tong+$order['ShippingMethod']['price']); ?></td>

		<td class="actions">			
					
				
					<?php echo $this->Html->link(__('', true), array('action' => 'view', $order['Order']['id']),array('class'=>'view','label'=>'','title'=>'Xem chi tiết')); ?>			
					<?php echo $this->Html->link(__('', true), array('action' => 'edit', $order['Order']['id']),array('class'=>'edit','label'=>'','title'=>'Chỉnh sửa')); ?>				
					<?php echo $this->Html->link(__('', true), array('action' => 'delete', $order['Order']['id']), array('class'=>'delete','label'=>'','title'=>'Xóa'), sprintf(__('Bạn chắc xóa mẫu tin số %s?', true), $order['Order']['id'])); ?>
		</td>
	</tr>


<?php 

endforeach; ?>
	</table>

	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Trang %page% / %pages%, hiển thị %current% bản ghi trong tổng số %count% bản, bắt đầu là bản ghi số %start%, kết thúc tại bản ghi số %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('Trước', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Sau', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>

</form> </div>


