<div class="shippingMethods index">
	<h2><?php __('Shipping Methods');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('processor');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($shippingMethods as $shippingMethod):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $shippingMethod['ShippingMethod']['id']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['active']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['price']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['processor']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['name']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['created']; ?>&nbsp;</td>
		<td><?php echo $shippingMethod['ShippingMethod']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $shippingMethod['ShippingMethod']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $shippingMethod['ShippingMethod']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $shippingMethod['ShippingMethod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $shippingMethod['ShippingMethod']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		
	</ul>
</div>