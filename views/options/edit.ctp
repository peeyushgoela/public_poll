<div class="options form">
<label>Q.)<?php echo $questions['Question']['question']?></label>
<?php echo $this->Form->create('Option');?>
	<fieldset>
 		<legend><?php __('Edit Option'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question_id',array('type'=>'hidden','value'=>$this->Session->read('QId')));
		echo $this->Form->input('option');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Option.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Option.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
	</ul>
</div>