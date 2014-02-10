<?php
/**
 * Marvel API - Comics Wrapper.
 * 
 * @see http://developer.marvel.com/docs
 */
require_once 'MarvelAPI.php';
require_once 'MarvelAPI_Curl.php';

class MarvelAPI_Events extends MarvelAPI {
	
	
	/**
	 * End Point for Series.
	 * @var unknown
	 */
	private $comicsEndPoint = '/v1/public/comics';
	
	

	public function search($format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, 
			$stories=NULL, $sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
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
		
		$url = parent::initCall($this->comicsEndPoint, $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	
	/**
	 * Fetch a specific comic.
	 * 
	 * @param int $eventId
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied id is not valid.");
		}

		$url = parent::initCall($this->comicsEndPoint."/$id");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	
	/**
	 * Fetch the characters within a comic.
	 * 
	 */
	public function fetchCharacters($id, $name=NULL, $modifiedSince=NULL, $series=NULL, $events=NULL, $stories=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
		
		$url = parent::initCall($this->eventsEndPoint."/$id/characters", $params);
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['series']       	 = $series;
		$params['events']			 = $events;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		$params['stories']			 = $stories;
		
		
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
	public function fetchCreators($id, $firstName=NULL, $lastName=NULL, $middleName=NULL,
			$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
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
		$params['series']		 = $series;
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
	 * Fetch events ties to a creator.
	 * 
	 * @param unknown $id
	 * @param string $name
	 * @param string $modifiedSeries
	 * @param string $characters
	 * @param string $series
	 * @param string $comics
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */	
	public function fetchEvents($id, $name=NULL, $modifiedSeries=NULL, $creators=NULL, $characters=NULL, $series=NULL, $stories=NULL, $orderBy=NULL, 
			$limit=NULL, $offset=NULL){
	
		if(!ctype_digit($id)){
			throw new Exception("Supplied id not valid.");
		}
	
		//Create the call. Parameters Keys from the API Specs.
		$params['name']   		 = $name;
		$params['modifiedSince'] = $modifiedSince;
		$params['creators']		 = $creators;
		$params['stories']		 = $stories;
		$params['characters']    = $characters;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['characters']    = $characters;
		$params['series']		 = $series;
	
	
		$url = parent::initCall($this->comicsEndPoint."/$id/events", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
	
	
	
	/**
	 * Search for a specific creator
	 *
	 * @param int $id
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
	public function fetchStories($id, $modifiedSince=NULL, $series=NULL, $events=NULL, $creators=NULL, $characters=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
		if(!ctype_digit($seriesId)){
			throw new Exception("Supplied id not valid.");
		}
	
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']		 = $series;
		$params['events']        = $events;
		$params['characters']	 = $characters;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['creators']		 = $creators;
	
		$url = parent::initCall($this->comicsEndPoint."/$id/stories", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
}