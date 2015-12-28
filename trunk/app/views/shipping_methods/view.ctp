<div class="shippingMethods view">
<h2><?php  __('Shipping Method');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Processor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['processor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingMethod['ShippingMethod']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shipping Method', true), array('action' => 'edit', $shippingMethod['ShippingMethod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Shipping Method', true), array('action' => 'delete', $shippingMethod['ShippingMethod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $shippingMethod['ShippingMethod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shipping Rules', true), array('controller' => 'shipping_rules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Rule', true), array('controller' => 'shipping_rules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Orders');?></h3>
	<?php if (!empty($shippingMethod['Order'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Shipping Method Id'); ?></th>
		<th><?php __('Payment Method Id'); ?></th>
		<th><?php __('Country Id'); ?></th>
		<th><?php __('Session'); ?></th>
		<th><?php __('Number'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Phone'); ?></th>
		<th><?php __('Address'); ?></th>
		<th><?php __('Re Name'); ?></th>
		<th><?php __('Re Phone'); ?></th>
		<th><?php __('Re Address'); ?></th>
		<th><?php __('Shipping Method'); ?></th>
		<th><?php __('Shipping Price'); ?></th>
		<th><?php __('Payment Method'); ?></th>
		<th><?php __('Payment Price'); ?></th>
		<th><?php __('State Tax'); ?></th>
		<th><?php __('Comments'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shippingMethod['Order'] as $order):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $order['id'];?></td>
			<td><?php echo $order['user_id'];?></td>
			<td><?php echo $order['shipping_method_id'];?></td>
			<td><?php echo $order['payment_method_id'];?></td>
			<td><?php echo $order['country_id'];?></td>
			<td><?php echo $order['session'];?></td>
			<td><?php echo $order['number'];?></td>
			<td><?php echo $order['name'];?></td>
			<td><?php echo $order['email'];?></td>
			<td><?php echo $order['phone'];?></td>
			<td><?php echo $order['address'];?></td>
			<td><?php echo $order['re_name'];?></td>
			<td><?php echo $order['re_phone'];?></td>
			<td><?php echo $order['re_address'];?></td>
			<td><?php echo $order['shipping_method'];?></td>
			<td><?php echo $order['shipping_price'];?></td>
			<td><?php echo $order['payment_method'];?></td>
			<td><?php echo $order['payment_price'];?></td>
			<td><?php echo $order['state_tax'];?></td>
			<td><?php echo $order['comments'];?></td>
			<td><?php echo $order['created'];?></td>
			<td><?php echo $order['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'orders', 'action' => 'view', $order['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'orders', 'action' => 'edit', $order['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'orders', 'action' => 'delete', $order['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	
	<?php
		$i = 0;
		foreach ($shippingMethod['ShippingRule'] as $shippingRule):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shippingRule['id'];?></td>
			<td><?php echo $shippingRule['shipping_method_id'];?></td>
			<td><?php echo $shippingRule['type'];?></td>
			<td><?php echo $shippingRule['min'];?></td>
			<td><?php echo $shippingRule['max'];?></td>
			<td><?php echo $shippingRule['price'];?></td>
			<td><?php echo $shippingRule['created'];?></td>
			<td><?php echo $shippingRule['modified'];?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shipping Rule', true), array('controller' => 'shipping_rules', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
