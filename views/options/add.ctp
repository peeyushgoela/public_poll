<div class="options form">
<label>Q.)<?php echo $questions['Question']['question']?></label>
<?php echo $this->Form->create('Option');?>
	<fieldset>
 		<legend><?php __('Add Option'); ?></legend>
	<?php
		echo $this->Form->input('question_id',array('type'=>'hidden','value'=>$this->Session->read('QId')));
		echo $this->Form->input('option');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Options'), array('controller' => 'questions', 'action' => 'view',$this->Session->read('QId')));?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>