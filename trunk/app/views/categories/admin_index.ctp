<div id="content">
<?php //var_dump($cha);
	//die();
?>
<h1 class="status-1">Thư mục sản phẩm</h1>
<a class="add" ><?php echo $this->Html->link(__('New catergory', true), array('action' => 'add')); ?></a>
<?php echo $this->Session->flash();?>
<form action="" method="post" >
<div id="fixed"><img src="<?php echo $this->webroot;?>img/icons/package.gif" width="16" height="16" alt="" /> Danh sách thư mục hiện có</div>
<fieldset style="display: none;"><input type="hidden" value="POST" name="_method"></fieldset>
<table cellspacing="0" id="products">
    <thead>
        <tr>
			<th class="id">ID</th>
        	<th class="name">Tên</th>
        	<th class="active">Trạng thái</th>
			<th class="modified"> Ngày cập nhật</th>
			<th class="actions"><?php __('Thao tác');?></th>
        </tr>
    </thead>
	
    <tbody>
			<?php
				$i = 0;
				foreach ($categories as $category):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
			?>
			<tr <?php echo $class;?> >
					<td><?php echo $category['Category']['id']; ?>&nbsp;</td>
					
					<td><?php
							if ($category['Category']['parent_id'] != 0){
								echo "- ";
								echo $category['Category']['name'];
							}else{
								echo $category['Category']['name'];
							}
						?>&nbsp;
					</td>
					<td>
					<?php
							if ($category['Category']['active'] == 1){
							echo $this->Html->link(__('', true), array('action' => 'active', $category['Category']['id']),array('class'=>'active','label'=>''));
							//kiem tra neu co thu muc con trong do thi tien hang set lai active =0
								
								}
							else
								echo $this->Html->link(__('', true), array('action' => 'unactive', $category['Category']['id']),array('class'=>'unactive','label'=>''));
					
												
						
						
					?>&nbsp;
					

					</td>
					
					<td><?php echo $category['Category']['modified']; ?>&nbsp;</td>		
					<td class="actions">
						<?php 

							echo $this->Html->link(__('', true), array('action' => 'view', $category['Category']['id']),array('class'=>'view','label'=>'','title'=>'Xem chi tiết'));
							echo $this->Html->link(__('', true), array('action' => 'edit', $category['Category']['id']),array('class'=>'edit','label'=>'','title'=>'Chỉnh sửa'));
							echo $this->Html->link(__('', true), array('action' => 'delete', $category['Category']['id']), array('class'=>'delete','label'=>'','title'=>'Xóa'), sprintf(__('Bạn chắc xóa mẫu tin số %s?', true), $category['Category']['id']));
						
					?>
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




