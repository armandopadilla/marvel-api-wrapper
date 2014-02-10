<?php
/**
 * Marvel API - Creator Wrapper.
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
	private $creatorsEndPoint = '/v1/public/creators';
	
	
	/**
	 * Search for a specific creator.
	 * 
	 * @param unknown $firstName
	 * @param string $middleName
	 * @param string $lastName
	 * @param string $suffix
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $series
	 * @param string $events
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @return unknown
	 */
	public function search($firstName, $middleName=NULL, $lastName=NULL, $suffix=NULL, 
			$modifiedSince=NULL, $comics=NULL, $series=NULL,  $events=NULL, $stories=NULL, 
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['firstName']         = $firstName;
		$params['lastName']		     = $lastName;
		$params['middleName']		 = $middleName;
		$params['suffix']			 = $suffix;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['stories']		 	 = $stories;
		$params['series']		 	 = $series;
		$params['events']			 = $events;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->creatorsPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific creator.
	 * 
	 * @param int $eventId
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied id is not valid.");
		}

		$url = parent::initCall($this->creatorsEndPoint."/$id");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	

	/**
	 * Fetch the comics for a specific event.
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
	public function fetchComics($id, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $characters=NULL, $series=NULL, $events=NULL, $stories=NULL,
			$sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
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
		
		$url = parent::initCall($this->storiesEndPoint."/$id/comics", $params);
		
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
	public function fetchEvents($id, $name=NULL, $modifiedSeries=NULL, $characters=NULL, $series=NULL, $comics=NULL, $stories=NULL, $orderBy=NULL, 
			$limit=NULL, $offset=NULL){
	
		if(!ctype_digit($id)){
			throw new Exception("Supplied id not valid.");
		}
	
		//Create the call. Parameters Keys from the API Specs.
		$params['name']   		 = $name;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['characters']    = $characters;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['characters']    = $characters;
		$params['series']		 = $series;
	
	
		$url = parent::initCall($this->creatorsEndPoint."/$id/events", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
	
	/**
	 * Fetch series for a specific creator.
	 * 
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
	public function fetchSeries($id, $title=NULL, $modifiedSince=NULL, $comics=NULL,  $stories=NULL, $events=NULL, $characters=NULL, 
			$seriesType=NULL, $contains=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['title']   		 = $title;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['events']        = $events;
		$params['characters']    = $characters;
		$params['seriesType']    = $seriesType;
		$params['contains']		 = $contains;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		
		$url = parent::initCall($this->creatorsEndPoint."/$id/series", $params);
		
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
	public function fetchStories($id, $modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, $characters=NULL,
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
	
		$url = parent::initCall($this->creatorsEndPoint."/$id/stories", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
}