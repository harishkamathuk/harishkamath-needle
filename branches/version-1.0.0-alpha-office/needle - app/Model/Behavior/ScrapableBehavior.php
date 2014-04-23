<?php
/**
 * ScrapableBehavior
 *
 * Needle : Screen scraping tool
 * Copyright (c) Harish Kamath (http://www.harishkamath.com)
 *
 *
 * @copyright     Copyright (c) Harish Kamath (http://www.harishkamath.com)
 * @link          http://www.harishkamath.com/needle
 * @package       app.Model
 * @since         Needle v0.1alpha
 * @license       N/A
 */

App::uses('ModelBehavior', 'Model');
App::uses('HttpSocket', 'Network/Http');

/**
 * ScrapableBehavior 
 *
 * This behaviour allow a model to scrape data from a URI
 *
 * @package       Needle.Controller.Component
 * @link          http://www.harishkamath.com
 *
 * @todo	Integrate the HTMLPurifier feature to clean up the HTML retrieved from sites
 * @todo 	Integrate with pman application
*/

class ScrapableBehavior extends ModelBehavior {

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

	// TODO: Constructor
	// TODO: Initiallization
	
	/**
	 * Scrape data from URL provided to the function
	 *
	 * @param string $url The URL of the web page to be scraped
	 * @param array $data An array with key value pairs to POST-ed with the request
	 * @return string Returns the body of the response
	 * @link http://api.cakephp.org/2.4/class-HttpSocket.html
	*/
	public function fetch (Model $Model, $url = null, $data = array()) {

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
