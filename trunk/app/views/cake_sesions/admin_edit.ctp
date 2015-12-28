<div class="cakeSesions form">
<?php echo $this->Form->create('CakeSesion');?>
	<fieldset>
		<legend><?php __('Admin Edit Cake Sesion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('data');
		echo $this->Form->input('expires');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CakeSesion.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CakeSesion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cake Sesions', true), array('action' => 'index'));?></li>
	</ul>
</div>