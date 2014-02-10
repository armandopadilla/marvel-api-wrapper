<?php
/**
 * Marvel API - Stories Wrapper.
 * 
 * @see http://developer.marvel.com/docs
 */
require_once 'MarvelAPI.php';
require_once 'MarvelAPI_Curl.php';

class MarvelAPI_Stories extends MarvelAPI {
	
	
	/**
	 * End Point for Series.
	 * 
	 * @var unknown
	 */
	private $storiesEndPoint = '/v1/public/stories';
	
	
	/**
	 * Search for a story.
	 * 
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $series
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @return unknown
	 */
	public function search($modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, 
			$creators=NULL, $characters=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['events']		 	 = $events;
		$params['creators']		     = $creators;
		$params['characters']		 = $characters;
		$params['series']		 	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->seriesEndPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific story by id.
	 * 
	 * @param int $storyId
	 */
	public function fetchById($storyId){
		
		if(!ctype_digit($storyId)){
			throw new Exception("Supplied story id is not valid.");
		}

		$url = parent::initCall($this->storiesEndPoint."/$storyId");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific story.
	 * 
	 * @param unknown $seriesId
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $series
	 * @param string $events
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchCharacters($storyId, $name=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($storyId)){
			throw new Exception("Supplied story id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['events']		 	 = $events;
		$params['series']       	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->storiesEndPoint."/$storyId/characters", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific story.
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
	public function fetchComics($storyId, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, 
			$sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($storyId)){
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
		$params['series']       	 = $series;
		$params['sharedAppearances'] = $sharedAppearances;
		$params['collaborators']	 = $collaborators;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->storiesEndPoint."/$storyId/comics", $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the creators for the specific story.
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
	public function fetchCreators($storyId, $firstName=NULL, $lastName=NULL, $middleName=NULL,
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, $series=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($storyId)){
			throw new Exception("Supplied story id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['firstName']     = $firstName;
		$params['middleName']    = $middleName;
		$params['lastName']	     = $lastName;
		$params['suffix']		 = $suffix;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['events']		 = $events;
		$params['series']        = $series;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		  
		
		$url = parent::initCall($this->storiesEndPoint."/$storyId/creators", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
	
	/**
	 * Fetch events for a specific story.
	 * 
	 * @param unknown $storyId
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $comics
	 * @param string $series
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchEvents($storyId, $name=NULL, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $comics=NULL,  
			$series=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($storyId)){
			throw new Exception("Supplied story id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']   		 = $name;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']		 = $series;
		$params['creators']      = $creators;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['characters']    = $characters;
		
		
		$url = parent::initCall($this->storiesEndPoint."/$storyId/events", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
}