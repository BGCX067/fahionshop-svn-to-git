<div class="cakeSesions form">
<?php echo $this->Form->create('CakeSesion');?>
	<fieldset>
		<legend><?php __('Admin Add Cake Sesion'); ?></legend>
	<?php
		echo $this->Form->input('data');
		echo $this->Form->input('expires');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cake Sesions', true), array('action' => 'index'));?></li>
	</ul>
</div>