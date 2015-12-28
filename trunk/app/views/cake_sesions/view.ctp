<div class="cakeSesions view">
<h2><?php  __('Cake Sesion');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cakeSesion['CakeSesion']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cakeSesion['CakeSesion']['data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Expires'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $cakeSesion['CakeSesion']['expires']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cake Sesion', true), array('action' => 'edit', $cakeSesion['CakeSesion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Cake Sesion', true), array('action' => 'delete', $cakeSesion['CakeSesion']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $cakeSesion['CakeSesion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cake Sesions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cake Sesion', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
