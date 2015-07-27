<?php
class Contact extends AppModel {

	public $name = 'Contact';
	public $validate = array(
		'name' => 'notEmpty',
        'email' => array(
			'rule' => 'email',
			'message' => 'Please enter a valid Email Address'
		),
		'telephone' => array(
			'rule' => 'numeric',
			'message' => 'Please enter a numeric Telephone Number'
		),
		'message' => 'notEmpty'
    );
}