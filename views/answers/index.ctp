<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login')); ?> </li>
	</ul>
</div>
<div class="view">
	<h2><?php echo __('Questions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('Question');?></th>
			<th><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($questions as $question):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['question']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->Link(('Post Answer'), array('controller'=>'answers','action' => 'add',$question['Question']['id'])) ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
