<?php
/**
 * Marvel API - Events Wrapper.
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
	private $charactersEndPoint = '/v1/public/characters';
	
	
	/**
	 * Search for a specific event.
	 * 
	 * @param unknown $name
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $series
	 * @param string $events
	 * @param string $creators
	 * @param string $characters
	 * @param string $stories
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @return unknown
	 */
	public function search($name, $modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, $stories=NULL, 
		$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['stories']		 	 = $stories;
		$params['series']		 	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		$params['events']			 = $events;
		
		$url = parent::initCall($this->charactersEndPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific character by id.
	 * 
	 * @param int $eventId
	 */
	public function fetchById($id){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied character id is not valid.");
		}

		$url = parent::initCall($this->characterEndPoint."/$id");
		
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
			$modifiedSince=NULL, $creators=NULL, $series=NULL, $events=NULL, $stories=NULL,
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
		$params['events']		 	 = $events;
		$params['series']       	 = $series;
		$params['sharedAppearances'] = $sharedAppearances;
		$params['collaborators']	 = $collaborators;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->charactersEndPoint."/$id/comics", $params);
		
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
	public function fetchEvents($id, $name=NULL, $modifiedSince=NULL, $creators=NULL, $series=NULL, $comics=NULL,
			$stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
	
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
		$params['stories']    	 = $stories;
	
	
		$url = parent::initCall($this->charactersEndPoint."/$id/events", $params);
	
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
	public function fetchSeries($id, $title=NULL, $modifiedSince=NULL, $comics=NULL,  $stories=NULL, $events=NULL, $creators=NULL, 
			$seriesType=NULL, $contains=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied id is not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['title']   		 = $title;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['creators']      = $creators;
		$params['events']    	 = $events;
		$params['seriesType']    = $seriesType;
		$params['contains']		 = $contains;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		
		$url = parent::initCall($this->charactersEndPoint."/$id/series", $params);
		
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
	public function fetchStories($id, $modifiedSince=NULL, $comics=NULL, $series=NULL, $events=NULL, $creators=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
		if(!ctype_digit($id)){
			throw new Exception("Supplied id not valid.");
		}
	
		//Create the call. Parameters Keys from the API Specs.
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']		 = $series;
		$params['creators']      = $creators;
		$params['characters']	 = $characters;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['events']		 = $events;
	
		$url = parent::initCall($this->charactersEndPoint."/$id/stories", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
}