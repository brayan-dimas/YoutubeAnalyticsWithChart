<?php  

// Config for google api key for youtube data

require_once 'vendor/googleapi/vendor/autoload.php';
$developer_key = "AIzaSyCVred6qycLlHca6ZsUh-AffUJZnns4Mec";

$client = new Google_Client(); // Object for gooogle client

// Set developer key to fetch youtube data as api or developer key is required for it.
$client->setDeveloperKey($developer_key);

// echo $client->setDeveloperKey($developer_key);
// Start for youtube services now.
$youtube123 = new Google_Service_Youtube($client);

// Check if everything is fine 
// if (!$youtube) {
// 	echo "Error found";
// }else {
// 	echo "Data found";
// }

// $trending_videos = $youtube->videos->listVideos(
// 	'snippet', array('chart'=>'mostPopular', 'maxResults'=>5)
// ); // Pass parameters 

// echo "<pre>";
// 	print_r($trending_videos);
// echo "</pre>";



// https://www.googleapis.com/youtube/v3/videos?part=snippet&chart=mostPopular&maxResults=5&key=AIzaSyCVred6qycLlHca6ZsUh-AffUJZnns4Mec HTTP/1.1
?>