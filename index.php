<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	<link href="css/simple-sidebar.css" rel="stylesheet">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"> -->


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">SAMPLE</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Youtube API</a>
        <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

       <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div> -->
      </nav>

      <div class="container-fluid overflow-auto">
       <h1>YOUTUBE API</h1>
       <?php  
        include 'Functions.php';


        // Get Trending Video
        $get_trending_items = VideoList($youtube123, 'snippet, contentDetails, statistics', array('chart'=>'mostPopular','maxResults'=>2,'regionCode'=>'ph'));

        // $get_trending_items - buong data.
        // $get_trending_items->items = ina-access lng nya is ung items na key.

        $trending_items = $get_trending_items->items;

        // get all records using foreach
        foreach ($trending_items as $key => $item) {
          // $item->snippet->title = $item = value. Sinelect nya ung snippet na key, then inextract nya ung title na key.
          // echo $key; 
          $videos_id = $item->id;     
          echo "<br><div class='container'>";
          echo '<canvas id="myChart'. $item->id . '"></canvas>';
          echo $title       = '<h1>'. $item->snippet->title . '</h1><br>';
          echo $video_id    = '<b>Video ID: </b><br>'. $item->id . '<br>';
          echo "<strong>Uploaded BY: ".$item->snippet->channelTitle."</strong><br>";
          echo "<h4>Views: </h4><br>" . '<img src="'.$item->snippet->thumbnails->maxres->url.'" style="width: 500px" /><br>';
          echo "<b>Views count: </b>" . $item->statistics->viewCount .'<br>';
          echo "<b>Likes count: </b>". $item->statistics->likeCount.'<br>';
          echo "<b>Dislikes count: </b>". $item->statistics->dislikeCount.'<br>';
          echo "<b>Favorite count: </b>". $item->statistics->favoriteCount.'<br>';
          echo "<b>Comment count: </b>". $item->statistics->commentCount.'<br>';
          echo "<a href='https://youtube.com/watch?v=".$videos_id."' target='blank'><h1>".$title."</h1></a><br>";
          echo $description = '<h3>Description:</h3><br>'. $item->snippet->description.'<br><br>';
          echo "</div>";
        }

        // echo "<pre>";
        //  print_r($get_trending_items);
        // echo "</pre>";

        ?>
        <!-- <div class="container">
          <button class="btn btn-success" onclick="updateChart()">Update</button>
          <canvas id="myChart"></canvas>
        </div> -->
 
       <!--  <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p> -->
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


<script type="text/javascript">
	window.onload = function() {
	    console.log("LOADED");

	    var updateInterval = 20 //in ms
	    var numberElements = 200;

	    var updateCount = 0;

		Chart.defaults.global.defaultFontFamily = 'Impact, Charcoal, sans-serif'; //"Lucida Console", Courier, monospace
		Chart.defaults.global.defaultFontSize   = 18;
		Chart.defaults.global.defaultFontColor  = '#777';

		var commonOptions = {
	        scales: {
	          xAxes: [{
	            type: 'time',
	            time: {
	              displayFormats: {
	                millisecond: 'mm:ss:SSS'
	              }
	            }
	          }],
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        },
	        legend: {display: false},
	        tooltips:{
	          enabled: false
	        }
	    };

	    function addData(data) {
	     	// console.log(data[0].commentCount)
	     	for (var i = 0; i < data.length; i++) {
	     		// console.log(data[i].mychart_id);
	     		let myChart = document.getElementById(data[i].mychart_id).getContext('2d');
	     		let massPopChart = new Chart(myChart, {
					type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
					data:{
						labels:['Views', 'Likes', 'Dislikes', 'Favorite', 'Comment'],
						datasets:[{
							label:'Youtube',
							data:[
								47395,
								32482,
								42198,
								38320,
								40500
							],
							backgroundColor:[
								'#33cc33', // Green
								'#0000ff', // Blue
								'#990000', // Red
								'#9900ff', // Violet
								'#ffff80'  // Yellow
							],
							borderWidth: 4,
							// borderColor: '#2eb8b8',
							hoverBorderWidth: 3,
							hoverBorderColor: '#009999'
						}]
					},
					options:{
						title: {
							display: true,
							text: 'Youtube Trending Videos',
							fontSize: 25,
							fontColor: '#00ccff',
							// fontColor: '#005580',				
						},
						legend: {
							display: true,
							position: 'right',
							labels:{
								fontColor: '#000'
							}

						},
						layout: {
							padding: {
								left: 0,
								right: 0,
								bottom: 0,
								top: 0
							}
						},
						tooltips: {
							enabled: true
						}
					},

				});

	     		massPopChart.data.datasets[0].data = [
	     			data[i].stats.viewCount,
	     			data[i].stats.likeCount,
	     			data[i].stats.dislikeCount,	     			
	     			data[i].stats.favoriteCount,
	     			data[i].stats.commentCount, 	     			
	     		];
	     		massPopChart.data.labels = ['Views', 'Likes', 'Dislikes', 'Favorite', 'Comment'];
				massPopChart.update();  
	     	}
			    
	    };

	    function updateData() {
	      console.log("Update Data");
	      // $.getJSON("TrendingVideos.php", addData);
	      $.ajax({
	            url: 'TrendingVideos.php',
	            success:    function(response){
	            	console.log(response)
	                addData(response)
	            },
	            error: function(xhr, status, error) {            	
	            	console.log(error);
	            }
	        });
	      // setTimeout(updateData,updateInterval);
	    }

	    updateData();
	}

</script>
</body>
</html>