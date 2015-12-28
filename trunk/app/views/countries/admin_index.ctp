<div id="content">
<h1 class="status-1">Quốc gia</h1>
<a class="add" ><?php echo $this->Html->link(__('Thêm quốc gia', true), array('action' => 'add')); ?> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</a>
<a class="add" ><?php echo $this->Html->link(__('Thêm thành phố', true), array('controller' => 'provinces', 'action' => 'add')); ?></a>
<?php echo $this->Session->flash();?>
<form action="" method="post" >
<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Danh sách các nước</div>
<fieldset style="display: none;"><input type="hidden" value="POST" name="_method"></fieldset>
<table cellspacing="0" id="products">
    <thead>
        <tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Mã nước');?></th>
			<th><?php echo $this->Paginator->sort('Tên nước');?></th>
			<th><?php echo $this->Paginator->sort('Trạng thái');?></th>
			<th class="actions"><?php __('Thao tác');?></th>
        </tr>
    </thead>
	
    <tbody>
			<?php
		$i = 0;
		foreach ($countries as $country):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			?>
	<tr <?php echo $class;?>>
		<td><?php echo $country['Country']['id']; ?>&nbsp;</td>
		<td><?php echo $country['Country']['code3']; ?>&nbsp;</td>
		<td><?php echo $country['Country']['name']; ?>&nbsp;</td>
		
		<td><?php
			if ($country['Country']['active'] == 1){
			echo $this->Html->link(__('', true), array('action' => 'active', $country['Country']['id']),array('class'=>'active','label'=>''));
				}
			else
				echo $this->Html->link(__('', true), array('action' => 'unactive', $country['Country']['id']),array('class'=>'unactive','label'=>''));
		?>&nbsp;
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('', true), array('action' => 'edit', $country['Country']['id']),array('class'=>'edit','label'=>'')); ?>	
			<?php echo $this->Html->link(__('', true), array('action' => 'delete', $country['Country']['id']), array('class'=>'delete','label'=>''), sprintf(__('Bạn chắc xóa mẫu tin số %s?', true), $country['Country']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
