<?php
class User extends AppModel {
	public $name = 'User';
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Username Cannot Be Empty!!!'
				),
			'is_Unique' => array(
				'rule' => array('isUnique'),
				'message' => 'this Username is already taken!!!'
				)
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please Enter a password!!!'
				)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please give a valid Email Address!!!'
				),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Email address is mandatory for registeration!!!'
				)			
		),
	);
	
	public function validateLogin($data)
	{
		$user = $this->find(array('username' => $data['Username'], 'password' => $data['Password'])); 
			if(empty($user) == false) 
				return $user['User']; 
			return false; 
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'user_id',
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
