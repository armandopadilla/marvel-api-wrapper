<?php
/**
 * Marvel API Series API Wrapper.
 * 
 * @see http://developer.marvel.com/docs
 */

require 'MarvelAPI.php';
require 'MarvelAPI_Curl.php';

class MarvelAPI_Series extends MarvelAPI {
	
	
	/**
	 * End Point for Series.
	 * @var unknown
	 */
	private $seriesEndPoint = '/v1/public/series';
	
	
	/**
	 * Search for the series.
	 * 
	 * @param unknown $title
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $stories
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $seriesType
	 * @param string $contain
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @return unknown
	 */
	public function search($title, $modifiedSince=NULL, $comics=NULL, $stories=NULL, $events=NULL, 
			$creators=NULL, $characters=NULL, $seriesType=NULL, $contain=NULL, $orderBy=NULL, 
			$limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['title']         	 = $title;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['events']		 	 = $events;
		$params['creators']		     = $creators;
		$params['characters']		 = $characters;
		$params['seriesType']		 = $seriesType;
		$params['stories']       	 = $stories;
		$params['contains']			 = $contains;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		
		$url = parent::initCall($this->seriesEndPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific series by Id.
	 * 
	 * @param int $seriedId
	 */
	public function fetchById($seriesId){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}

		$url = parent::initCall($this->seriesEndPoint."/$seriesId", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific series.
	 * 
	 * @param unknown $seriesId
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $event
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchCharacters($seriesId, $name=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, 
			$stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['events']		 	 = $events;
		$params['stories']       	 = $stories;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->seriesEndPoint."/$seriesId/characters", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific series.
	 * 
	 * @param unknown $seriesId
	 * @param string $format
	 * @param string $formatType
	 * @param string $noVariants
	 * @param string $dateDescriptor
	 * @param string $dateRange
	 * @param string $hasDigitalIssue
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $events
	 * @param string $stories
	 * @param string $sharedAppearances
	 * @param string $collaborators
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchComics($seriesId, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $events=NULL, 
			$stories=NULL, $sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['format']		 	 = $format;
		$params['formatType']    	 = $formatType;
		$params['noVariants']	 	 = $noVariants;
		$params['dateDescriptors']	 = $dateDescriptor;
		$params['dateRange']		 = $dateRange;
		$params['hasDigitalIssue']   = $hasDigitalIssue;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['creators']			 = $creators;
		$params['characters']		 = $characters;
		$params['events']		 	 = $events;
		$params['stories']       	 = $stories;
		$params['sharedAppearances'] = $sharedAppearances;
		$params['collaborators']	 = $collaborators;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->seriesEndPoint."/$seriesId/comics", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the creators for the specific series.
	 * 
	 * @param unknown $seriesId
	 * @param string $firstName
	 * @param string $lastName
	 * @param string $middleName
	 * @param string $suffix
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $events
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchCreators($seriesId, $firstName=NULL, $lastName=NULL, $middleName=NULL,
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['firstName']     = $firstName;
		$params['middleName']    = $middleName;
		$params['lastName']	     = $lastName;
		$params['suffix']		 = $suffix;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['events']		 = $events;
		$params['stories']       = $stories;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		  
		
		$url = parent::initCall($this->seriesEndPoint."/$seriesId/creators", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
	
	/**
	 * Fetch events for a specific series.
	 * 
	 * @param unknown $seriesId
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $comics
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchEvents($seriesId, $name=NULL, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $comics=NULL,  
			$stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']   		 = $name;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['creators']      = $creators;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['characters']    = $characters;
		
		
		$url = parent::initCall($this->seriesEndPoint."/$seriesId/events", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the stories for a specific series.
	 * 
	 * @param int $seriesId
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchStories($seriesId, $modifiedSince=NULL, $comics=NULL, $events=NULL, $creators=NULL, $characters=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied series in not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['events']		 = $events;
		$params['creators']      = $creators;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		$url = parent::initCall($this->seriesEndPoint."/$seriesId/stories", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
}