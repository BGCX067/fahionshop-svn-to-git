<div class="orders index">
	<h2><?php __('Orders');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('shipping_method_id');?></th>
			<th><?php echo $this->Paginator->sort('payment_method_id');?></th>
			<th><?php echo $this->Paginator->sort('province_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('city');?></th>
			<th><?php echo $this->Paginator->sort('re_name');?></th>
			<th><?php echo $this->Paginator->sort('re_phone');?></th>
			<th><?php echo $this->Paginator->sort('re_address');?></th>
			<th><?php echo $this->Paginator->sort('re_country');?></th>
			<th><?php echo $this->Paginator->sort('re_city');?></th>
			<th><?php echo $this->Paginator->sort('shipping_method');?></th>
			<th><?php echo $this->Paginator->sort('shipping_price');?></th>
			<th><?php echo $this->Paginator->sort('payment_method');?></th>
			<th><?php echo $this->Paginator->sort('payment_price');?></th>
			<th><?php echo $this->Paginator->sort('state_tax');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('active');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
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
		<td>
			<?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['ShippingMethod']['name'], array('controller' => 'shipping_methods', 'action' => 'view', $order['ShippingMethod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['PaymentMethod']['name'], array('controller' => 'payment_methods', 'action' => 'view', $order['PaymentMethod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['Province']['name'], array('controller' => 'provinces', 'action' => 'view', $order['Province']['id'])); ?>
		</td>
		<td><?php echo $order['Order']['name']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['email']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['phone']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['address']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['country']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['city']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['re_name']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['re_phone']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['re_address']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['re_country']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['re_city']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['shipping_method']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['shipping_price']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['payment_method']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['payment_price']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['state_tax']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['comments']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['active']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['created']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $order['Order']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['Order']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Order', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('controller' => 'shipping_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('controller' => 'shipping_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Methods', true), array('controller' => 'payment_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Method', true), array('controller' => 'payment_methods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Provinces', true), array('controller' => 'provinces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Province', true), array('controller' => 'provinces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Line Items', true), array('controller' => 'line_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Line Item', true), array('controller' => 'line_items', 'action' => 'add')); ?> </li>
	</ul>
</div>