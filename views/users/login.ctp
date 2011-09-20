<div class='view'>
<h1 style="font-size:24px;height:30px;width:100px;background-color:rgb(200,200,255)">LOGIN</h1>
<?php 
echo '<div style="background-color:rgb(200,200,255);width:240px;padding:20px;border:2px solid rgb(200,200,255);boxalign:"center";">';
echo $this->Form->create('User',array('action'=>'login'));
echo $this->Form->input('Username',array('style'=>'width:200px'));
echo $this->Form->input('Password',array('style'=>'width:200px','type'=>'password'));
echo $this->Form->end('Login');
echo '</div>';?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('SignUp'), array('action' => 'signup')); ?></li>
		<li><?php echo $this->Html->link(__('Participate in Public Poll'), array('controller' => 'answers', 'action' => 'index')); ?> </li>
	</ul>
</div>
