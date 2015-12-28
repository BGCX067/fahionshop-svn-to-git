<div id="content">
<h1 class="status-1">Tỉnh/thành phố </h1>
<a class="add" ><?php echo $this->Html->link(__('Thêm tỉnh thành', true), array('action' => 'add')); ?></a>
<form action="" method="post" >
<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Danh sách các tỉnh thành</div>
<fieldset style="display: none;"><input type="hidden" value="POST" name="_method"></fieldset>
<table cellspacing="0" id="provinces">
	<thead>
		<tr>
					<th><?php echo $this->Paginator->sort('id');?></th>
					<th><?php echo $this->Paginator->sort('country_id');?></th>
					<th><?php echo $this->Paginator->sort('Tên');?></th>
					<th><?php echo $this->Paginator->sort('Ngày tạo lập');?></th>
					<th><?php echo $this->Paginator->sort('Ngày cập nhật');?></th>
					<th class="actions"><?php __('Thao tác');?></th>
			</tr>
	</thead>
	<tbody>
		<?php
	$i = 0;
	foreach ($provinces as $province):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $province['Province']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($province['Country']['name'], array('controller' => 'countries', 'action' => 'view', $province['Country']['id'])); ?>
		</td>
		<td><?php echo $province['Province']['name']; ?>&nbsp;</td>
		<td><?php echo $province['Province']['created']; ?>&nbsp;</td>
		<td><?php echo $province['Province']['modified']; ?>&nbsp;</td>	
		<td class="actions">			
					<?php echo $this->Html->link(__('', true), array('action' => 'edit', $province['Province']['id']),array('class'=>'edit','label'=>'')); ?>
					
					<?php echo $this->Html->link(__('', true), array('action' => 'delete', $province['Province']['id']), array('class'=>'delete','label'=>''), sprintf(__('Bạn chắc xóa mẫu tin số %s?', true), $province['Province']['id'])); ?>
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

</form> 
</div>
