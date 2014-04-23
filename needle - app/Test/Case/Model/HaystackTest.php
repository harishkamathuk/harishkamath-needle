<?php
App::uses('Haystack', 'Model');

/**
 * Haystack Test Case
 *
 */
class HaystackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.haystack',
		'app.needles'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Haystack = ClassRegistry::init('Haystack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Haystack);

		parent::tearDown();
	}

}
