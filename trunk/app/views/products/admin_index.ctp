<div id="content">
<h1 class="status-1">Sản phẩm</h1>
<a class="add" ><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></a>
<?php echo $this->Session->flash();?>
<form action="" method="post" >
<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Các sản phẩm hiện có </div>
<fieldset style="display: none;"><input type="hidden" value="POST" name="_method"></fieldset>
<table cellspacing="0" id="products">
    <thead>
        <tr>			
			<th><?php echo $this->Paginator->sort('Mã sp');?></th>
			<th><?php echo $this->Paginator->sort('Tên');?></th>
			<th><?php echo $this->Paginator->sort('Giá');?></th>
			<th><?php echo $this->Paginator->sort('Giá khuyến mãi');?></th>
			<th><?php echo $this->Paginator->sort('Trạng thái');?></th>
			<th><?php echo $this->Paginator->sort('Số lượng');?></th>
			
			<th class="actions"><?php __('Chức năng');?></th>
        </tr>
    </thead>
	
    <tbody>
	<?php
		$i = 0;
		foreach ($products as $product):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
            <tr <?php echo $class;?>>
				<td><?php echo $product['Product']['code']; ?>&nbsp;</td>
				<td><?php echo $product['Product']['name']; ?>&nbsp;</td>
				<td><?php echo $price->currency($product['Product']['price']); ?>&nbsp;</td>
				<td><?php echo $price->currency($product['Product']['special_price']); ?>&nbsp;</td>
				
				<td><?php
					if ($product['Product']['active'] == 1){
					echo $this->Html->link(__('', true), array('action' => 'active', $product['Product']['id']),array('class'=>'active','label'=>'','title'=>'Trạng thái được kích hoạt'));
						}
					else
						echo $this->Html->link(__('', true), array('action' => 'unactive', $product['Product']['id']),array('class'=>'unactive','label'=>'','title'=>'Trạng thái hủy kích hoạt'));
				?>&nbsp;
				</td>
				
				<td><?php echo $product['Product']['quantity']; ?>&nbsp;</td>
				<td class="actions">
					
					<?php echo $this->Html->link(__('', true), array('action' => 'edit', $product['Product']['id']),array('class'=>'edit','label'=>'','title'=>'Chỉnh sửa')); ?>
					
					<?php echo $this->Html->link(__('', true), array('action' => 'delete', $product['Product']['id']), array('class'=>'delete','label'=>'','title'=>'Xóa'), sprintf(__('Bạn chắc xóa mẫu tin số %s?', true), $product['Product']['id'])); ?>
				</td>
           </tr>
		 <?php endforeach; ?>
    </tbody>
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