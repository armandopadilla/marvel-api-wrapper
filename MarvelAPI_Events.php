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
	private $eventsEndPoint = '/v1/public/events';
	
	
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
	public function search($name, $modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $comics=NULL, $stories=NULL, 
		$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['stories']		 	 = $stories;
		$params['creators']		     = $creators;
		$params['characters']		 = $characters;
		$params['series']		 	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		
		$url = parent::initCall($this->eventsEndPoint, $params);

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch a specific event by id.
	 * 
	 * @param int $eventId
	 */
	public function fetchById($eventId){
		
		if(!ctype_digit($eventId)){
			throw new Exception("Supplied event id is not valid.");
		}

		$url = parent::initCall($this->eventsEndPoint."/$eventId");
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}
	
	
	/**
	 * Fetch the characters for a specific event.
	 * 
	 * @param unknown $eventId
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
	public function fetchCharacters($id, $name=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		$url = $this->eventsEndPoint."/$id/characters";
		
		return parent::fetchCharacters($url, $id, $name, $modifiedSince, $comics, $series, $orderBy, $limit, $offset);

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
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, $stories=NULL,
			$sharedAppearances=NULL, $collaborators=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		
		$url = $this->storiesEndPoint."/$id/comics";
		
		return parent::fetchComics($url, $id, $format, $formatType, 
			$noVariants, $dateDescripto, $dateRange, $hasDigitalIssue, 
			$modifiedSince, $creators, $characters, $series, $events, $stories,
			$sharedAppearances, $collaborators, $orderBy, $limit, $offset);

	}
	
	
	/**
	 * Fetch the creators for the specific events.
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
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		$url = $this->eventsEndPoint."/$id/creators";
		
		$response = parent::fetchCreators($url, $id, $firstName=NULL, $lastName=NULL, $middleName=NULL,
			$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL);
		
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
	public function fetchSeries($id, $title=NULL, $modifiedSince=NULL, $comics=NULL,  $stories=NULL, $creators=NULL, $characters=NULL, 
			$seriesType=NULL, $contains=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['title']   		 = $title;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['stories']		 = $stories;
		$params['creators']      = $creators;
		$params['characters']    = $characters;
		$params['seriesType']    = $seriesType;
		$params['contains']		 = $contains;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		
		
		$url = parent::initCall($this->eventsEndPoint."/$id/series", $params);
		
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
	public function fetchStories($id, $modifiedSince=NULL, $comics=NULL, $series=NULL, $creators=NULL, $characters=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
	
		if(!ctype_digit($seriesId)){
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
	
		$url = parent::initCall($this->eventsEndPoint."/$id/stories", $params);
	
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
	
		return $response;
	}
	
}