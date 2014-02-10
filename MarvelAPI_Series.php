<?php
/**
 * Marvel API - Series API Wrapper.
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
	 * Search for a series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getSeriesCollection_get_25
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
			$creators=NULL, $characters=NULL, $seriesType=NULL, $contains=NULL, $orderBy=NULL, 
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
	 * @see http://developer.marvel.com/docs#!/public/getSeriesIndividual_get_26
	 * 
	 * @param int $id
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id is not valid.");
		}

		$url = parent::initCall($this->seriesEndPoint."/$id", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getSeriesCharacterWrapper_get_27
	 * 
	 * @param int $id
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
	public function fetchCharacters($id, $name=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, 
			$stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id not valid.");
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
		
		$url = parent::initCall($this->seriesEndPoint."/$id/characters", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getComicsCollection_get_28
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
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $events=NULL, 
			$stories=NULL, $sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id not valid.");
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
		
		$url = parent::initCall($this->seriesEndPoint."/$id/comics", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the creators for the specific series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getCreatorCollection_get_29
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
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $events=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id not valid.");
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
		  
		
		$url = parent::initCall($this->seriesEndPoint."/$id/creators", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
	
	/**
	 * Fetch events for a specific series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getEventsCollection_get_30
	 * 
	 * @param int $id
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
	public function fetchEvents($id, $name=NULL, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $comics=NULL,  
			$stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id not valid.");
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
		
		
		$url = parent::initCall($this->seriesEndPoint."/$id/events", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the stories for a specific series.
	 * 
	 * @see http://developer.marvel.com/docs#!/public/getSeriesStoryCollection_get_31
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
	public function fetchStories($id, $modifiedSince=NULL, $comics=NULL, $events=NULL, $creators=NULL, $characters=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied series id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['events']		 = $events;
		$params['creators']      = $creators;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		$url = parent::initCall($this->seriesEndPoint."/$id/stories", $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
}