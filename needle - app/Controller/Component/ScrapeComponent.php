<?php

/**
 * Scrape Component
 *
 * Needle : Screen scraping tool
 * Copyright (c) Harish Kamath (http://www.harishkamath.com)
 *
 *
 * @copyright     Copyright (c) Harish Kamath (http://www.harishkamath.com)
 * @link          http://www.harishkamath.com/needle
 * @package       app.Controller
 * @since         Needle
 * @license       N/A
 */

App::uses('Component', 'Controller');
App::uses('HttpSocket', 'Network/Http');

/**
 * ScrapeComponent 
 *
 * This component is used for scrapping data from URL provided
 * as input. It can also return if it finds any needle in the 
 * haysack
 *
 * @package       Needle.Controller.Component
 * @link          http://www.harishkamath.com
 * 
 * @todo	Integrate the HTMLPurifier feature to clean up the HTML retrieved from sites				 
 * @todo 	Integrate with pman application
 */

class ScrapeComponent extends Component {

	/**
	 * Header information to sent with the request
	 *
	 * @var array
	 */
	public $headers = array();

	/**
	 * Data to be POST-ed with the request
	 *
	 * @var array
	 */
	public $data = array();
	
	
	/**
	 * Constructor
	 *
	 * @param ComponentCollection $collection A ComponentCollection this component can use to lazy load its components
	 * @param array $settings Array of configuration settings.
	 */
	//public function __construct(ComponentCollection $collection, $settings = array()) {
	//	$this->_controller = $collection->getController();
	//	parent::__construct($collection, $settings);
	//}
	
	/**
	 * Initialize component
	 *
	 * @param Controller $controller Instantiating controller
	 * @return void
	 */
	//public function initialize(Controller $controller) {
	//	if (Configure::read('App.encoding') !== null) {
	//		$this->charset = Configure::read('App.encoding');
	//	}
	//}
	
	
	
	/**
	 * Scrape data from URL provided to the function
	 *
	 * @param string $url The URL of the web page to be scraped
	 * @param array $data An array with key value pairs to POST-ed with the request
	 * @return string Returns the body of the response
	 * @link http://api.cakephp.org/2.4/class-HttpSocket.html
	 */
	public function fetch ($url = null, $data = array()) {

		// instantiate a CakePHP network socket connection class
		$HttpSocket = new HttpSocket( array(
			'ssl_verify_peer' => false,
			'ssl_verify_host' => false)
		);
		
		
		// TODO: Clean up the intialization of $request variable
		$request = array(
			// 'method' => 'GET',
			/* 'uri' => $url,
					array(
				'scheme' => 'http',
				'host' => null,
				'port' => 80,
				'user' => null,
				'pass' => null,
				'path' => null,
				'query' => null,
					'fragment' => null
			), */
			/* 'auth' => array(
				'method' => 'Basic',
				'user' => null,
				'pass' => null
			), */
			// 'version' => '1.1',
			// 'body' => '',
			// 'line' => null,
			'header' => array(
				// 'Connection' => 'close',
				'User-Agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)' // TODO: Move to config
			),
			// 'raw' => null,
			'redirect' => 5, // TODO: Move to config
			'cookies' => array(
				'CAKEPHP'   => 'b6d3bca4d372dd6a58c4e46d2f60f0ef', // TODO: Use CakePHP Cookie?
				'cookieKey' => 'cookieValue' // TODO: Use CakePHP Cookie?
			)				
		);
		
		// post the request
		// $response = $HttpSocket->post($url, $data, $request);
		$response = $HttpSocket->get($url, array(), array('redirect' => 5));
		
		// TODO: do some SANITY checks before return the value
		return $response->body;
		
	}
	
}

?>