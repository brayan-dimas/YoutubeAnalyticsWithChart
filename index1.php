<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bootstrap Sidebar</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <h1>YOUTUBE API</h1>
               <?php  
                include 'Functions.php';


                // Get Trending Video
                $get_trending_items = VideoList($youtube, 'snippet, contentDetails, statistics', array('chart'=>'mostPopular','maxResults'=>2,'regionCode'=>'ph'));

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
            <!-- <h2>Collapsible Sidebar Using Bootstrap 4</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

<script type="text/javascript">
    window.onload = function() {
        console.log("LOADED");

        //Configuration variables
        var updateInterval = 20 //in ms
        var numberElements = 200;

        //Globals
        var updateCount = 0;
        // let myChart = document.getElementById('myChart').getContext('2d');
        // Global Options

        Chart.defaults.global.defaultFontFamily = 'Impact, Charcoal, sans-serif'; //"Lucida Console", Courier, monospace
        Chart.defaults.global.defaultFontSize   = 18;
        Chart.defaults.global.defaultFontColor  = '#777';
        
        // function updateChart() {
        //  massPopChart.data.datasets[0].data = [1,2,3,4,5];
        //  massPopChart.data.labels = ['Views1', 'Likes1', 'Dislike1s', 'Favorite1', 'Comment1'];
        //  massPopChart.update();
        // }

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