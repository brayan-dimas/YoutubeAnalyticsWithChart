<?php  

include 'Config.php';

// Send data and get Response of youtube video
$trending_videos = $youtube->videos->listVideos(
	'snippet', array('chart'=>'mostPopular', 'maxResults'=>5)
); // Pass parameters 

echo "<pre>";
	print_r($trending_videos);
echo "</pre>";