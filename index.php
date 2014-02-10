<?php
require_once 'MarvelAPI.php';
//require 'MarvelAPI_Series.php';
require 'MarvelAPI_Stories.php';


//$MS = new MarvelAPI_Series();


/**
 * Series Data!
 */
//$seriesData = $MS->search("civil war");
//$seriesData = $MS->fetchById(13379);
//$seriesData = $MS->fetchCharacters(13379);
//$seriesData = $MS->fetchComics(13379);
//$seriesData = $MS->fetchCreators(13379);
//$seriesData = $MS->fetchEvents(13379);
//$seriesData = $MS->fetchStories(13379);


/**
 * Stories Data.
 */
$MSS = new MarvelAPI_Stories();


//$storyData  = $MSS->fetchById(3);
//$storyData  = $MSS->fetchCharacters(13379);
//$storyData  = $MSS->fetchComics(13379);
//$storyData = $MSS->fetchCreators(13379);
//$storyData = $MSS->fetchEvents(13379);

/**
 * Events Data
 */
$MSS = new MarvelAPI_Events();

echo print_r(json_decode($storyData, 1), 1);