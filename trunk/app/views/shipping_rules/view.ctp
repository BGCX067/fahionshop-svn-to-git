<div class="shippingRules view">
<h2><?php  __('Shipping Rule');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shipping Method'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($shippingRule['ShippingMethod']['name'], array('controller' => 'shipping_methods', 'action' => 'view', $shippingRule['ShippingMethod']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Min'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['min']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Max'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['max']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shippingRule['ShippingRule']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shipping Rule', true), array('action' => 'edit', $shippingRule['ShippingRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Shipping Rule', true), array('action' => 'delete', $shippingRule['ShippingRule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $shippingRule['ShippingRule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shipping Rules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Rule', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('controller' => 'shipping_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('controller' => 'shipping_methods', 'action' => 'add')); ?> </li>
	</ul>
</div>
