<div class="questions form">
<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('UserId')));
		echo $this->Form->input('question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
	</ul>
</div>