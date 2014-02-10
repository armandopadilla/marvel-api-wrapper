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
	 * @see http://developer.marvel.com/docs#!/public/getStoryCollection_get_32
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
		$params['series']		 	 = $series;
		$params['events']		 	 = $events;
		$params['creators']		     = $creators;
		$params['characters']		 = $characters;
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
	 * @see http://developer.marvel.com/docs#!/public/getStoryIndividual_get_33
	 * 
	 * @param int $id Story Id.
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied story id is not valid.");
		}

		$url = parent::initCall($this->storiesEndPoint."/$id");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific story.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getCreatorCollection_get_34
	 * 
	 * @param int $id
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
	public function fetchCharacters($id, $name=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
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
		
		$url = parent::initCall($this->storiesEndPoint."/$id/characters", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific story.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getComicsCollection_get_35
	 * 
	 * @param unknown $id
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
	public function fetchComics($id, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, 
			$sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied story id not valid.");
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
	 * @see http://developer.marvel.com/docs#!/public/getCreatorCollection_get_36
	 * 
	 * @param unknown $id
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
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, $series=NULL, $orderBy=NULL, 
		$limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
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
		  
		
		$url = parent::initCall($this->storiesEndPoint."/$id/creators", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
	
	/**
	 * Fetch events for a specific story.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getEventsCollection_get_37
	 * 
	 * @param unknown $id
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $creators
	 * @param string $characters
	 * @param string $comics
	 * @param string $series
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * 
	 * @throws Exception
	 * @return unknown
	 */
	public function fetchEvents($id, $name=NULL, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $comics=NULL,  
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
		
		
		$url = parent::initCall($this->storiesEndPoint."/$id/events", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
}