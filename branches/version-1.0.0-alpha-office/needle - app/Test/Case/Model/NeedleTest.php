<?php
App::uses('Needle', 'Model');

/**
 * Needle Test Case
 *
 */
class NeedleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.needle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Needle = ClassRegistry::init('Needle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Needle);

		parent::tearDown();
	}

}
