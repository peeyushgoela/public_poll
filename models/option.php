<?php
class Option extends AppModel {
	public $name = 'Option';
	public $validate = array(
		'question_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Question Id should be numeric...',
				),
		),
		'option' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'the option has to have some value',
				),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
