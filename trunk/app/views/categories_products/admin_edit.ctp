<div class="categoriesProducts form">
<?php echo $this->Form->create('CategoriesProduct');?>
	<fieldset>
		<legend><?php __('Admin Edit Categories Product'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CategoriesProduct.product_id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CategoriesProduct.product_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Products', true), array('action' => 'index'));?></li>
	</ul>
</div>