<div class="contents form">
<?php echo $this->Form->create('Content');?>
	<fieldset>
		<legend><?php __('Admin Edit Content'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content_category_id');
		echo $this->Form->input('active');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Content.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Content.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contents', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Content Categories', true), array('controller' => 'content_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content Category', true), array('controller' => 'content_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>