<?php
/**
 * MarvelAPI wrapper.
 * 
 * @see http://developer.marvel.com/docs
 */ 
class MarvelAPI {

	/**
	 * Public Key supplied by the Marvel API.
	 * 
	 * @var String
	 */
	const PUBLIC_KEY = "<YOUR_PUBLIC_KEY_HERE>";
	
	
	/**
	 * Private key supplied by the Marvel API.
	 * 
	 * @var String
	 */
	const PRIVATE_KEY = "<YOUR_PRIVATE_KEY_HERE>";
	
	
	/**
	 * URL to call APIs.
	 * 
	 * @var String
	 */
	protected $url = 'http://gateway.marvel.com';
	
	
	/**
	 * Timestamp,
	 * 
	 * @var unknown
	 */
	private $ts = NULL;
	
	
	/**
	 * Hash containing privateKey+publicKey+ts
	 * @var unknown
	 */
	private $hash = NULL;
	
	
	/**
	 * Default constructor.
	 * 
	 */
	public function __construct(){}
	
	
	/**
	 * Build the url to call.
	 * 
	 * @param unknown $endPoint
	 * @param unknown $params
	 */
	public function getURL($endPoint, $params=array())
	{
		
		$this->ts   = time();
		$this->hash = md5($this->ts."".$this->privateKey."".$this->publicKey);
		
		$url = $this->url.$endPoint."?";

		$query = "";
		foreach($params as $key => $value){
			if(!empty($value)){
				$query .= "&".$key."=".$value;
			}
		}
		
		$url .= "ts=".$this->ts."&hash=".$this->hash."&apikey=".$this->publicKey.$query;
		
		return $url;
		
	}
	
	
	/**
	 * Fetch the characters for object.  
	 * 
	 * @param unknown $id
	 * @param string $name
	 * @param string $modifiedSince
	 * @param string $comics
	 * @param string $series
	 * @param string $orderBy
	 * @param string $limit
	 * @param string $offset
	 * @throws Exception
	 * @return unknown
	 */
	protected function fetchCharacters($urlEndPoint, $id, $name=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL,
			$orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied event id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['name']				 = $name;
		$params['modifiedSince'] 	 = $modifiedSince;
		$params['comics']			 = $comics;
		$params['series']       	 = $series;
		$params['orderBy']		 	 = $orderBy;
		$params['limit']		 	 = $limit;
		$params['offset']		 	 = $offset;
		$params['stories']			 = $stories;
		
		$url = parent::initCall($urlEndPoint, $params);
		
		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
	}

	
	protected function fetchComics($urlEndPoint, $format=NULL, $formatType=NULL, 
			$noVariants=NULL, $dateDescriptor=NULL, $dateRange=NULL, $hasDigitalIssue=NULL, 
			$modifiedSince=NULL, $creators=NULL, $characters=NULL, $series=NULL, $events=NULL, $stories=NULL,
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
	

	protected function fetchCreators($url, $id, $firstName=NULL, $lastName=NULL, $middleName=NULL,
		$suffix=NULL, $modifiedSince=NULL, $comics=NULL, $series=NULL, $stories=NULL, $orderBy=NULL, $limit=NULL, $offset=NULL){
		
		if(!ctype_digit($id)){
			throw new Exception("Supplied id not valid.");
		}
		
		//Create the call. Parameters Keys from the API Specs.
		$params['firstName']     = $firstName;
		$params['middleName']    = $middleName;
		$params['lastName']	     = $lastName;
		$params['suffix']		 = $suffix;
		$params['modifiedSince'] = $modifiedSince;
		$params['comics']		 = $comics;
		$params['series']        = $series;
		$params['orderBy']		 = $orderBy;
		$params['limit']		 = $limit;
		$params['offset']		 = $offset;
		$params['stories']		 = $stories;
		

		//Send the call.
		$response = MarvelAPI_Curl::doCall($url);
		
		return $response;
		
	}
	
}