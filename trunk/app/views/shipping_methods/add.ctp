<div class="shippingMethods form">
<?php echo $this->Form->create('ShippingMethod');?>
	<fieldset>
		<legend><?php __('Add Shipping Method'); ?></legend>
	<?php
		echo $this->Form->input('active');
		echo $this->Form->input('price');
		echo $this->Form->input('processor');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Shipping Methods', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		
	</ul>
</div>