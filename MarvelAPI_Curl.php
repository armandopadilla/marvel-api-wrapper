<?php
/**
 * Handles the actual HTTP calls to the API.
 * 
 */
class MarvelAPI_Curl {
	
	
	/**
	 * Make a curl call to a url injected.
	 * 
	 * @param unknown $url
	 * @return unknown
	 */
	public function doCall($url){
		
		$cHandler = curl_init($url);
	
		curl_setopt($cHandler, CURLOPT_URL, $url);
		curl_setopt($cHandler, CURLOPT_RETURNTRANSFER, true);
		
		if(!$results = curl_exec($cHandler)){
			throw new Exception(curl_error($cHandler));
		}
		curl_close($cHandler);
		
		return $results;
		
	}	
	
}