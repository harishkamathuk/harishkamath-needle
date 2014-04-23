<?php
App::uses('AppModel', 'Model');
/**
 * Haystack Model
 *
 * @property Url $Url
 */
class Haystack extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Url' => array(
			'className' => 'Url',
			'foreignKey' => 'url_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * actsAs behaviors
	 *
	 * @var array
	 */
	public $actsAs = array('Mineable');	
}
