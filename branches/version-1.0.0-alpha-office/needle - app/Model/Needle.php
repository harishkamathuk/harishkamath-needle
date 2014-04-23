<?php
App::uses('AppModel', 'Model');
/**
 * Needle Model
 *
 * @property Url $Url
 */
class Needle extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Url' => array(
			'className' => 'Url',
			'foreignKey' => 'needle_id',
			'dependent' => false,
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
