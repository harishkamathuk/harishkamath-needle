<?php
/**
 * MineableBehavior
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

/**
 * MineableBehavior 
 *
 * This behaviour allows a model to mine a needle from a haystack
 *
 * @package       Needle.Controller.Component
 * @link          http://www.harishkamath.com
 *
 * @todo	Integrate the HTMLPurifier feature to clean up the HTML retrieved from sites
 * @todo 	Integrate with pman application
*/

class MineableBehavior extends ModelBehavior {
	
	// TODO: Constructor
	// TODO: Initiallization
	
	/**
	 * _stripHTML method
	 *
	 * @param string $str String from which to strip HTML
	 * @return string Input string without HTML tags
	 */
	private function _stripHTML($str = null) {
		return(strip_tags($str));
	}


	/**
	 * _fetchBetween method
	 *
	 * @param string $haystack String to search for "needle" in
	 * @param string $start Start pattern for needle search
	 * @param string $end End pattern for needle search
	 * @param string $include Include the "needle" search criteria in return value
	 * @return string Returns the "needle" - string - found in haystack
	 * @todo Determine if all methods need to be ported
	 * @todo Check if CakePHP already has this function
	 */	
	private function _fetchBetween($haystack = null, $start = null, $end = null, $include=false){
	
		$position = strpos($haystack,$start); // locate the start of needle in haystack
		
		if ($position === false) { // return null if nothing found
			return null; 
		}
		if ($include == false) // adjust position if search pattern is to be "included"
				$position += strlen($start);
		
		$position2 = strpos($haystack, $end, $position);
		
		if ($position2 === false) { // return null if nothing found 
			return null; 
		}
		if ($include == true) // adjust position if search pattern is to be "included"
			$position2 += strlen($end);

		$length = $position2 - $position; // calculate the length of the needle
		
		$substring = substr($haystack, $position, $length); // extract needle from haystack ...
		
 		return trim($substring); // ... and return to caller
	}	
	
	/**
	 * mine method
	 *
	 * @throws NotFoundException
	 * @return boolean true if needle is found in haystack; false otherwise
	 */
	public function mine(Model $Model, $haystack = null, $start = null, $end = null) {
		return $this->_stripHTML($this->_fetchBetween($haystack, $start, $end));		
	}		
}
?>
