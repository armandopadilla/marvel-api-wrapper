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
		$this->hash = md5($this->ts."".self::PRIVATE_KEY."".self::PUBLIC_KEY);
		
		$url = $this->url.$endPoint."?";

		$query = "";
		foreach($params as $key => $value){
			if(!empty($value)){
				$query .= "&".$key."=".$value;
			}
		}
		
		$url .= "ts=".$this->ts."&hash=".$this->hash."&apikey=".self::PUBLIC_KEY.$query;
		
		return $url;
		
	}
	
}