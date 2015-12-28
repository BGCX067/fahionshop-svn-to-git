<div class="categoriesProducts form">
<?php echo $this->Form->create('CategoriesProduct');?>
	<fieldset>
		<legend><?php __('Admin Add Categories Product'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categories Products', true), array('action' => 'index'));?></li>
	</ul>
</div>