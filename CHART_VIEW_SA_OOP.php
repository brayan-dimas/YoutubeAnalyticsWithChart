<div class="box">
    <?php
        $data['buttons'] = ['ApplicationNames'];
        // echo '<br><br><br><br><br><br><pre>';
        //     print_r($data);
        // echo '</pre>';
        $this->load->view("content_management/template/buttons",$data);
    ?>
    <div class="box-body">    
        <div class="gooa-box gooa-box-6">
            <div class="gooa-box-inner">                    
                <h1 class="gooa-heading-2">Youtube Anaytics Line</h1>
                <!-- <p>Sessions by device</p> -->
                <canvas id="line-chart" width="400" height="190"></canvas>
            </div>
            <!-- <div class="gooa-card-options col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <select class="gooa-select device_date_filter">
                            <option value="0">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="7" selected>Last 7 Days</option>
                            <option value="14">Last 14 Days</option>
                            <option value="28">Last 28 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 180 Days</option>
                            <option>Last Calendar Year</option>
                        </select>
                    </div>
                </div>
            </div>       -->
        </div>

        <div class="gooa-box gooa-box-6">
            <div class="gooa-box-inner">                    
                <h1 class="gooa-heading-2">Youtube Anaytics Pie</h1>
                <!-- <p>Sessions by device</p> -->
                <canvas id="pie-chart" width="400" height="190"></canvas>
            </div>
            <!-- <div class="gooa-card-options col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <select class="gooa-select device_date_filter">
                            <option value="0">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="7" selected>Last 7 Days</option>
                            <option value="14">Last 14 Days</option>
                            <option value="28">Last 28 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 180 Days</option>
                            <option>Last Calendar Year</option>
                        </select>
                    </div>
                </div>
            </div>       -->
        </div>
                    
        <div class="gooa-box gooa-box-6">
            <div class="gooa-box-inner">                    
                <h1 class="gooa-heading-2">Youtube Analytics Bar</h1>
                <canvas id="time-chart" width="400" height="200"></canvas>
            </div>
            <!-- <div class="gooa-card-options col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <select class="gooa-select time_date_filter">
                            <option value="0">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="7" selected>Last 7 Days</option>
                            <option value="14">Last 14 Days</option>
                            <option value="28">Last 28 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 180 Days</option>
                            <option>Last Calendar Year</option>
                        </select>
                    </div>
                </div>
            </div>       -->
        </div>
        
        <!-- <div class="gooa-box gooa-box-6">
            <div class="gooa-box-inner">                    
                <h1 class="gooa-heading-2">Youtube Anaytics Line</h1>
                <p>Sessions by device</p>
                <canvas id="map-chart" width="400" height="190"></canvas>
            </div>
            <div class="gooa-card-options col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <select class="gooa-select device_date_filter">
                            <option value="0">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="7" selected>Last 7 Days</option>
                            <option value="14">Last 14 Days</option>
                            <option value="28">Last 28 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 180 Days</option>
                            <option>Last Calendar Year</option>
                        </select>
                    </div>
                </div>
            </div>      
        </div> -->
    </div>

    <div class="box-body"> 
        <div class="gooa-box gooa-box-6">
            <div class="gooa-box-inner">                    
                <h1 class="gooa-heading-2">Youtube Channel Analytics</h1>
                <!-- <p>Sessions by device</p> -->
                <canvas id="channel-chart" width="400" height="190"></canvas>
            </div>
            <!-- <div class="gooa-card-options col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <select class="gooa-select device_date_filter">
                            <option value="0">Today</option>
                            <option value="1">Yesterday</option>
                            <option value="7" selected>Last 7 Days</option>
                            <option value="14">Last 14 Days</option>
                            <option value="28">Last 28 Days</option>
                            <option value="30">Last 30 Days</option>
                            <option value="90">Last 90 Days</option>
                            <option value="180">Last 180 Days</option>
                            <option>Last Calendar Year</option>
                        </select>
                    </div>
                </div>
            </div>       -->
        </div>
    </div>
    
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script>

    $(document).ready(function(){
        // $("table th .sort-icon").addClass("fa-sort");
        //     appname = $('#s_appname')[0].value;

        // $(document).on('change', '#s_appname', function(e) {
        //     appname = $('#s_appname')[0].value;            
            user_time();
            chart_option();
            user_time1();
            user_time2();
            user_time3();
        // });

    });

    // var base_url = '<?=base_url();?>';
    // var role = '<?=$this->session->userdata("sess_role");?>';
    // var content_management = '<?=base_url("content_management");?>';
    var trending_videos = '<?=base_url("content_management/yt_trending_videos");?>';

    // var start_date = "<?=date('Y-m-d',strtotime('-7 days'))?>";
    // var end_date   = "<?=date('Y-m-d',strtotime('-1 days'))?>"; 
    // var appname = '<?=$this->uri->segment(4);?>';;

    // var server = "<?=$this->config->item('websocket_server')?>";
    // var port = "<?=$this->config->item('websocket_port')?>";
    // var ssl = "<?=$this->config->item('ssl')?>";
    // var request = ssl == "TRUE" ? "wss" : "ws";
    // var socket = new WebSocket(request+'://'+server+':'+port+'/websocket/');
    // var socket = new WebSocket('ws://'+server+':'+port+'/websocket/');

    function chart_option() {
        piegraphoption = {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    boxWidth: 12,
                    fontSize: 8
                }
            }
        },

        timechartoption = {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    boxWidth: 12,
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        drawOnChartArea: false
                    }
                }],
                yAxes: [{
                    position: 'right',  
                }]
            }
        },
        
        linegraphoption = {
            scales: {
                xAxes: [{
                    gridLines: {
                        drawOnChartArea: false
                    }
                }],
                yAxes: [{
                    position: 'right',  
                }]
            }
        }
    }

    function user_time() {
        canvas12 = $('#time-chart');

        var visit_url  = trending_videos;
        var visit_time = [];
        var result_obj = [];
        var visit_main_labels = [];
        var visit_dataset_label = [];
        var referral_datas_value = [];
        var referral_datas_value_loop = [];
        var visit_bgColor = [];
        var visit_color = 1;
        
        aJax.get(visit_url, function(result){            

            var obj = is_json(result);
            result_obj = obj;
            
            // console.log(result_obj) 
            if(result_obj[0].statistics.video == "trending_video"){           

                ///for main labels
                $.each(result_obj[0], function(x,y) {   
                    // console.log(y)
                    $.each(y.stats, function(x, y) {
                        // console.log(x)
                        visit_main_labels.push(
                            x.charAt(0).toUpperCase() + x.slice(1)
                        );             
                    });                   
                });
                // console.log(visit_main_labels)

                for (var n = 0; n < result_obj.length -1; n++) {
                    // rgb(242,183,5)
                    visit_bgColor.push(
                        "rgba(230, 57, 0, " + visit_color + ")",
                        "rgba(255, 64, 0, " + visit_color + ")",
                        "rgba(255, 83, 26, " + visit_color + ")",
                        "rgba(255, 102, 51, " + visit_color + ")",
                        "rgba(255, 121, 77, " + visit_color + ")"
                    );
                    visit_color = visit_color[n] - 0.1; 


                    referral_datas_value.push(                
                        // data: result_obj[i].stats
                        result_obj[0].statistics.stats.commentCount,
                        result_obj[0].statistics.stats.dislikeCount,                 
                        result_obj[0].statistics.stats.favoriteCount,   
                        result_obj[0].statistics.stats.likeCount,                                        
                        result_obj[0].statistics.stats.viewCount,
                    );      
                    referral_datas_value_loop.push({
                        label:'Youtube Trending Analytics', 
                        data: referral_datas_value,
                        // data: [140, 900, 600, 400, 300],
                        backgroundColor:visit_bgColor,
                        borderColor: visit_bgColor,
                        pointBackgroundColor: visit_bgColor,
                        pointBorderColor: visit_bgColor 
                    }) ;
                }
                // console.log(referral_datas_value_loop);            
                data12 = {
                    labels:visit_main_labels,
                    datasets:referral_datas_value_loop
                } 

                chart12 = new Chart(canvas12, {
                    type: 'bar',
                    data: data12,
                    options: timechartoption
                });   
            }
        });

    } 

    function user_time1() {
        canvas1 = $('#line-chart');

        var visit_url  = trending_videos;
        var visit_time = [];
        var result_obj = [];
        var visit_main_labels = [];
        var visit_dataset_label = [];
        var referral_datas_value = [];
        var referral_datas_value_loop = [];
        var visit_bgColor = [];
        var visit_color = 1;
        
        aJax.get(visit_url, function(result){            

            var obj = is_json(result);
            result_obj = obj;
            // console.log(result_obj)

            // console.log(result_obj) 
            if(result_obj[0].statistics.video == "trending_video"){           
                ///for main labels
                $.each(result_obj[0], function(x,y) {   
                    // console.log(y)
                    $.each(y.stats, function(x, y) {
                        // console.log(x)
                        visit_main_labels.push(
                            x.charAt(0).toUpperCase() + x.slice(1)
                        );             
                    });                   
                });
                // console.log(visit_main_labels)

                for (var index = 0; index < result_obj.length -1; index++) {
                    // rgb(242,183,5)
                    visit_bgColor.push(                    
                        "rgba(51, 204, 0, " + visit_color + ")",
                        "rgba(57, 230, 0, " + visit_color + ")",
                        "rgba(64, 255, 0, " + visit_color + ")",
                        "rgba(83, 255, 26, " + visit_color + ")",
                        "rgba(102, 255, 51, " + visit_color + ")"
                    );
                    visit_color = visit_color - 0.1; 

                    referral_datas_value.push(                
                        // data: result_obj[index].stats
                        result_obj[0].statistics.stats.commentCount,
                        result_obj[0].statistics.stats.dislikeCount,                 
                        result_obj[0].statistics.stats.favoriteCount,   
                        result_obj[0].statistics.stats.likeCount,                                        
                        result_obj[0].statistics.stats.viewCount,
                    );      
                    referral_datas_value_loop.push({
                        label:'Youtube Trending Analytics', 
                        data: referral_datas_value,
                        backgroundColor:visit_bgColor,
                        borderColor: visit_bgColor,
                        pointBackgroundColor: visit_bgColor,
                        pointBorderColor: visit_bgColor 
                    }) ;
                }
                // console.log(referral_datas_value)

                data13 = {
                    labels:visit_main_labels,
                    datasets:referral_datas_value_loop
                } 
                chart1 = new Chart(canvas1, {
                    type: 'line',
                    data: data13,
                    options: linegraphoption
                });    
            }        
        });

    } 

    function user_time2() {
        canvas7 = $('#pie-chart');

        var visit_url  = trending_videos;
        var visit_time = [];
        var result_obj = [];
        var visit_main_labels = [];
        var visit_dataset_label = [];
        var referral_datas_value = [];
        var referral_datas_value_loop = [];
        var visit_bgColor = [];
        var visit_color = 1;
        
        aJax.get(visit_url, function(result){            

            var obj = is_json(result);
            result_obj = obj;

            // console.log(result_obj) 
            if(result_obj[0].statistics.video == "trending_video"){           
                ///for main labels
                $.each(result_obj[0], function(x,y) {   
                    // console.log(y)
                    $.each(y.stats, function(x, y) {
                        // console.log(x)
                        visit_main_labels.push(
                            x.charAt(0).toUpperCase() + x.slice(1)
                        );             
                    });                   
                });
                // console.log(visit_main_labels)

                for (var i = 0; i < result_obj.length -1; i++) {
                    // rgb(242,183,5)
                    visit_bgColor.push(
                        "rgba(0, 102, 153, " + visit_color + ")",
                        "rgba(0, 119, 179, " + visit_color + ")",
                        "rgba(0, 136, 204, " + visit_color + ")",
                        "rgba(0, 153, 230, " + visit_color + ")",
                        "rgba(0, 170, 255, " + visit_color + ")",
                    );
                    visit_color = visit_color[i] - 0.1; 

                    referral_datas_value.push(                
                        // data: result_obj[i].stats
                        result_obj[0].statistics.stats.commentCount,
                        result_obj[0].statistics.stats.dislikeCount,                 
                        result_obj[0].statistics.stats.favoriteCount,   
                        result_obj[0].statistics.stats.likeCount,                                        
                        result_obj[0].statistics.stats.viewCount,
                    );      
                    referral_datas_value_loop.push({
                        label:'Youtube Trending Analytics', 
                        data: referral_datas_value,
                        backgroundColor:visit_bgColor,
                        borderColor: visit_bgColor,
                        pointBackgroundColor: visit_bgColor,
                        pointBorderColor: visit_bgColor 
                    }) ;
                    // console.log(visit_bgColor);
                }    

                data7 = {
                    labels:visit_main_labels,
                    datasets:referral_datas_value_loop
                } 
                chart7 = new Chart(canvas7, {
                    type: 'doughnut',
                    data: data7,
                    options: piegraphoption
                });
            }            
        });

    } 

    function user_time3() {
        canvas5 = $('#channel-chart');

        var visit_url  = trending_videos;
        var visit_time = [];
        var result_obj = [];
        var visit_main_labels = [];
        var visit_dataset_label = [];
        var referral_datas_value = [];
        var referral_datas_value_loop = [];
        var visit_bgColor = [];
        var visit_color = 1;
        
        aJax.get(visit_url, function(result){            

            var obj = is_json(result);
            result_obj = obj;
            
            console.log(result_obj)
            if(result_obj[1].statistics.video == "channel_video"){           
                ///for main labels
                $.each(result_obj[1], function(x,y) {   
                    // console.log(y)
                    $.each(y.stats, function(x, y) {
                        // console.log(x)
                        visit_main_labels.push(
                            x.charAt(0).toUpperCase() + x.slice(1)
                        );             
                    });                   
                });               
                // console.log(visit_main_labels)

                for (var n = 1; n < result_obj.length; n++) {
                    // rgb(242,183,5)
                    visit_bgColor.push(
                        "rgba(140, 26, 255, " + visit_color + ")",
                        "rgba(153, 51, 255, " + visit_color + ")",
                        "rgba(166, 77, 255, " + visit_color + ")",
                        "rgba(179, 102, 255, " + visit_color + ")",
                        "rgba(191, 128, 255, " + visit_color + ")"
                    );
                    visit_color = visit_color[n] - 0.1; 


                    referral_datas_value.push(                
                        // data: result_obj[i].stats
                        result_obj[1].statistics.stats.commentCount,
                        result_obj[1].statistics.stats.dislikeCount,                 
                        result_obj[1].statistics.stats.favoriteCount,   
                        result_obj[1].statistics.stats.likeCount,                                        
                        result_obj[1].statistics.stats.viewCount,
                    );      
                    referral_datas_value_loop.push({
                        label:'My Channel Analytics', 
                        data: referral_datas_value,
                        // data: [140, 900, 600, 400, 300],
                        backgroundColor:visit_bgColor,
                        borderColor: visit_bgColor,
                        pointBackgroundColor: visit_bgColor,
                        pointBorderColor: visit_bgColor 
                    }) ;
                }
                // console.log(referral_datas_value_loop);            
                data5 = {
                    labels:visit_main_labels,
                    datasets:referral_datas_value_loop
                } 

                chart5 = new Chart(canvas5, {
                    type: 'line',
                    data: data5,
                    options: timechartoption
                });    
            }        
        });

    } 

    // time visited
    $(document).on('change', '.time_date_filter', function() {
        var date_select = $(this).val();
        date_dropdown(date_select);
        chart1.destroy();
        chart5.destroy();
        chart7.destroy();
        chart12.destroy();
        user_time();
        user_time1();
        user_time2();
        user_time3();
    });
</script>