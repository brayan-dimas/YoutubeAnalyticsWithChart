<?php  

include 'Config.php';

// ITO AY SA TRENDING VIDEOS
// function VideoList($youtube,$part,$params)
// {
// 	$response = $youtube->videos->listVideos(
// 		$part,
// 		$params
// 	); 
// 	return $response;
// }

// ITO AY SA CHANNEL VIDEOS MO
function ActivitiesList($youtube,$part,$params)
{
	$response = $youtube->channels->listChannels(
		$part,
		$params
	); 
	return $response;
}