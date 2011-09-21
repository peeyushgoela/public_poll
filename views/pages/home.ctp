 <?php if($this->Session->read('UserId')!=NULL)echo Header('LOCATION','users/index');?>
 <center><h2>PUBLIC POLL</h2></center>
 <div class='view'>this is a public poll site which is not yet complete 
right now you can make you account post your questions here and give their options but nothing more can be done</div>
      <div class='actions'>
      <ul>
		<li><?php echo $this->Html->link(__('Login'), array('controller'=>'users','action' => 'login')); ?></li>
		<li><?php echo $this->Html->link(__('SignUp'), array('controller'=>'users','action' => 'signup')); ?></li>
      </ul>
      </div>
