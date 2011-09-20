<div class="questions form">

<?php echo $this->Form->create('Question');?>
	<fieldset>
 		<legend><?php __('Add Question'); ?></legend>
	<?php
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('UserId')));
		echo $this->Form->input('question');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index'));?></li>
	</ul>
</div>