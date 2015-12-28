<div class="orders form">
<?php echo $this->Form->create('Order');?>
	<fieldset>
		<legend><?php __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('shipping_method_id');
		echo $this->Form->input('payment_method_id');
		echo $this->Form->input('province_id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('country');
		echo $this->Form->input('city');
		echo $this->Form->input('re_name');
		echo $this->Form->input('re_phone');
		echo $this->Form->input('re_address');
		echo $this->Form->input('re_country');
		echo $this->Form->input('re_city');
		echo $this->Form->input('shipping_method');
		echo $this->Form->input('shipping_price');
		echo $this->Form->input('payment_method');
		echo $this->Form->input('payment_price');
		echo $this->Form->input('state_tax');
		echo $this->Form->input('comments');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index'));?></li>
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