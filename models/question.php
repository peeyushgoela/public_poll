<?php
class Question extends AppModel {
	public $name = 'Question';
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'This field has to be numeric!!!',
				),
		),
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Question is missing!!!',
				),
		),
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Option' => array(
			'className' => 'Option',
			'foreignKey' => 'question_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
