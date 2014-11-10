<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* Geocoder class
	* 
	*
	* @package   geocoder
	* @version   1.0.0
	* @author    Raphael Caixeta, Grip'd <raph@gripd.com>
	* @copyright Copyright (c) 2013, Raphael Caixeta
	* @license   http://www.opensource.org/licenses/mit-license.php
	* @link      http://github.com/raphaelcaixeta/geocoder/
	*
	*/

	class Geocoder {

		var $CI; 
		function __construct() {
			if(!isset($this->CI)) {
				$this->CI =& get_instance();
			} 
		}

		function geocode($address) {
			 
			if($address == '') { return FALSE; }
			$request_url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=true'; 
			
			$data = file_get_contents($request_url); 
			$response = json_decode($data); 
			 
			if($response->status!="OK") {
				return FALSE;
			} else {
				$location_details = $response->results[0]; 
				 
				return array(
					'address' => $location_details->formatted_address, 
					'city' => $location_details->address_components[0]->long_name,
					'town' => $location_details->address_components[1]->long_name,
					'state' => $location_details->address_components[2]->long_name, 
					'country' => $location_details->address_components[3]->long_name,
					'lat' => $location_details->geometry->location->lat,
					'lng' => $location_details->geometry->location->lng
				);
			}
		}

		function reverse_geocode($lat, $lng) { 
		
			if($lat == '') { return FALSE; }
			if($lng == '') { return FALSE; }

			$latlng = $lat . ',' . $lng;
			$request_url = 'http://maps.google.com/maps/api/geocode/json?latlng='.$latlng.'&sensor=true';
		 	  
			$data = file_get_contents($request_url); 
			$response = json_decode($data); 
			 
			if($response->status!="OK") {
				return FALSE;
			} else {
				$location_details = $response->results[0]; 
				 
				return array(
					'address' => $location_details->formatted_address, 
					'city' => $location_details->address_components[0]->long_name,
					'town' => $location_details->address_components[1]->long_name,
					'state' => $location_details->address_components[2]->long_name, 
					'country' => $location_details->address_components[3]->long_name,
					'lat' => $location_details->geometry->location->lat,
					'lng' => $location_details->geometry->location->lng
				);
			}
		}

		function makerequest($url) {
			$session = curl_init($url);
			curl_setopt($session, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($session);
			curl_close($session);
			return json_decode($response);
		}

	}

?>