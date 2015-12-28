<div class="lineItems form">

<h2>Day la bien lay tu session: <?php echo $bien = $this->Session->read('tham');?><h2>

<?php echo $this->Form->create('LineItem');?>
	<fieldset>
		<legend><?php __('Add Line Item'); ?></legend>
	<?php
		echo $this->Form->input('order_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('brand_id');
		echo $this->Form->input('product');
		echo $this->Form->input('quantity');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Line Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders', true), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order', true), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands', true), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand', true), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>