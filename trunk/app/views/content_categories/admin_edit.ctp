<div class="contentCategories form">
<?php echo $this->Form->create('ContentCategory');?>
	<fieldset>
		<legend><?php __('Admin Edit Content Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('active');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ContentCategory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ContentCategory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Content Categories', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Content Categories', true), array('controller' => 'content_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Content Category', true), array('controller' => 'content_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content', true), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>