<?php  

include 'Functions.php';

$max_results = 30;
$most_popular_video_region = VideoList($youtube, 'snippet, contentDetails, statistics', array('chart'=>'mostPopular','maxResults'=>$max_results,'regionCode'=>'ph'));

$items = $most_popular_video_region->items;


foreach ($items as $key => $item) {
	// $item->snippet->title = $item = value. Sinelect nya ung snippet na key, then inextract nya ung title na key.
	// echo $key;
	$videos_id = $item->id;	
	echo $title       = '<h1>'. $item->snippet->title . '</h1><br>';
	echo $video_id    = '<b>Video ID: </b><br>'. $item->id . '<br>';
	echo "<strong>Uploaded BY: ".$item->snippet->channelTitle."</strong><br>";
	echo "<h4>Views: </h4><br>" . '<img src="'.$item->snippet->thumbnails->maxres->url.'" style="width: 500px" /><br>';
	echo "Views count: " . $item->statistics->viewCount .'<br>';
	echo "Likes count: ". $item->statistics->likeCount.'<br>';
	echo "Dislikes count: ". $item->statistics->dislikeCount.'<br>';
	echo "Favorite count: ". $item->statistics->favoriteCount.'<br>';
	echo "Comment count: ". $item->statistics->commentCount.'<br>';
	echo "<a href='https://youtube.com/watch?v=".$videos_id."' target='blank'><h1>".$title."</h1></a><br>";
	echo $description = '<h3>Description:</h3><br>'. $item->snippet->description.'<br><br>';
}

echo "<pre>";
print_r($most_popular_video_region);
echo "</pre>";

