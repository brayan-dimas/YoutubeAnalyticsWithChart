<?php  

include 'Functions.php';
header('Content-Type: application/json');

// Get Trending Video
// $get_trending_items = VideoList($youtube123, 'snippet, contentDetails, statistics', array('chart'=>'mostPopular','maxResults'=>2,'regionCode'=>'ph'));

// CHANNEL
$get_trending_items = ActivitiesList($youtube123, 'snippet, contentDetails, statistics', array('id'=>'UCDSD1bcfofufjEhd8XoEr1w', 'maxResults'=>10));

// echo "<pre>";
// 	print_r($get_trending_items);
// echo "</pre>";

// $get_trending_items - buong data.
// $get_trending_items->items = ina-access lng nya is ung items na key.

$trending_items = $get_trending_items->items;



$data = array();


// get all records using foreach
foreach ($trending_items as $key => $item) {

	// $data.push($item->statistics);
	$statsAndId = array(
		// 'mychart_id' => 'myChart'.$item->id,
		'stats' => $item->statistics
	);
	
	array_push($data, $statsAndId);
// 	// $item->snippet->title = $item = value. Sinelect nya ung snippet na key, then inextract nya ung title na key.
// 	// echo $key;	
// 	$videos_id = $item->id;	
// 	echo $title       = '<h1>'. $item->snippet->title . '</h1><br>';
// 	echo $video_id    = '<b>Video ID: </b><br>'. $item->id . '<br>';
// 	echo "<strong>Uploaded BY: ".$item->snippet->channelTitle."</strong><br>";
// 	echo "<h4>Views: </h4><br>" . '<img src="'.$item->snippet->thumbnails->maxres->url.'" style="width: 500px" /><br>';
// 	echo "Views count: " . $item->statistics->viewCount .'<br>';
// 	echo "Likes count: ". $item->statistics->likeCount.'<br>';
// 	echo "Dislikes count: ". $item->statistics->dislikeCount.'<br>';
// 	echo "Favorite count: ". $item->statistics->favoriteCount.'<br>';
// 	echo "Comment count: ". $item->statistics->commentCount.'<br>';
// 	echo "<a href='https://youtube.com/watch?v=".$videos_id."' target='blank'><h1>".$title."</h1></a><br>";
// 	echo $description = '<h3>Description:</h3><br>'. $item->snippet->description.'<br><br>';
}

echo json_encode($data);

// // echo "<pre>";
// // 	print_r($get_trending_items);
// // echo "</pre>";