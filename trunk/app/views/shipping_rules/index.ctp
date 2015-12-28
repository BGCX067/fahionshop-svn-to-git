<div class="shippingRules index">
	<h2><?php __('Shipping Rules');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('shipping_method_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('min');?></th>
			<th><?php echo $this->Paginator->sort('max');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($shippingRules as $shippingRule):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $shippingRule['ShippingRule']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($shippingRule['ShippingMethod']['name'], array('controller' => 'shipping_methods', 'action' => 'view', $shippingRule['ShippingMethod']['id'])); ?>
		</td>
		<td><?php echo $shippingRule['ShippingRule']['type']; ?>&nbsp;</td>
		<td><?php echo $shippingRule['ShippingRule']['min']; ?>&nbsp;</td>
		<td><?php echo $shippingRule['ShippingRule']['max']; ?>&nbsp;</td>
		<td><?php echo $shippingRule['ShippingRule']['price']; ?>&nbsp;</td>
		<td><?php echo $shippingRule['ShippingRule']['created']; ?>&nbsp;</td>
		<td><?php echo $shippingRule['ShippingRule']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $shippingRule['ShippingRule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $shippingRule['ShippingRule']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $shippingRule['ShippingRule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $shippingRule['ShippingRule']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Shipping Rule', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('controller' => 'shipping_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('controller' => 'shipping_methods', 'action' => 'add')); ?> </li>
	</ul>
</div>