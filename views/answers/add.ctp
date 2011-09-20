<div class="answers form">
<?php echo $this->Form->create('Answer');?>
	<fieldset>
 		<legend><?php __('Add Answer'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('question_id');
		echo $this->Form->input('answer_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?> </li>
		<li><?php echo $this->Html->link(__('All Questions'), array('action' => 'index')); ?> </li>
	</ul>
</div>