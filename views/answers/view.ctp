<div class="answers view">
<h2><?php  echo __('Answer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($answer['Answer']['id']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($answer['Answer']['name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($answer['Answer']['email']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($answer['Question']['id'], array('controller' => 'questions', 'action' => 'view', $answer['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Answer'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($answer['Answer']['name'], array('controller' => 'answers', 'action' => 'view', $answer['Answer']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Answer'), array('action' => 'edit', $answer['Answer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Answer'), array('action' => 'delete', $answer['Answer']['id']), null, __('Are you sure you want to delete # %s?', $answer['Answer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers'), array('controller' => 'answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer'), array('controller' => 'answers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Answers');?></h3>
	<?php if (!empty($answer['Answer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Answer Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($answer['Answer'] as $answer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $answer['id'];?></td>
			<td><?php echo $answer['name'];?></td>
			<td><?php echo $answer['email'];?></td>
			<td><?php echo $answer['question_id'];?></td>
			<td><?php echo $answer['answer_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'answers', 'action' => 'view', $answer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'answers', 'action' => 'edit', $answer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'answers', 'action' => 'delete', $answer['id']), null, __('Are you sure you want to delete # %s?', $answer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Answer'), array('controller' => 'answers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
