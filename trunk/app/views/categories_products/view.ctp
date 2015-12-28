<div class="categoriesProducts view">
<h2><?php  __('Categories Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Category Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoriesProduct['CategoriesProduct']['category_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $categoriesProduct['CategoriesProduct']['product_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Product', true), array('action' => 'edit', $categoriesProduct['CategoriesProduct']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Categories Product', true), array('action' => 'delete', $categoriesProduct['CategoriesProduct']['product_id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $categoriesProduct['CategoriesProduct']['product_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Products', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Product', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
