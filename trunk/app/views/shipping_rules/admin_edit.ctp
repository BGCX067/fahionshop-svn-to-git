<div class="shippingRules form">
<?php echo $this->Form->create('ShippingRule');?>
	<fieldset>
		<legend><?php __('Admin Edit Shipping Rule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('shipping_method_id');
		echo $this->Form->input('type');
		echo $this->Form->input('min');
		echo $this->Form->input('max');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ShippingRule.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ShippingRule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shipping Rules', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('controller' => 'shipping_methods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shipping Method', true), array('controller' => 'shipping_methods', 'action' => 'add')); ?> </li>
	</ul>
</div>