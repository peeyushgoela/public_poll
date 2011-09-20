<div class="options view">
<h2><?php  echo __('Option');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($option['Option']['id']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($option['Question']['id'], array('controller' => 'questions', 'action' => 'view', $option['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Option'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($option['Option']['option']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Option'), array('action' => 'edit', $option['Option']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Option'), array('action' => 'delete', $option['Option']['id']), null, __('Are you sure you want to delete # %s?', $option['Option']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
