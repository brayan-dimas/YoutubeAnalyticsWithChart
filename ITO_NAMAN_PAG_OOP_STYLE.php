<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

require('vendor/googleapi/vendor/autoload.php');

class Yt_trending_videos extends CI_Controller {

    public $functions;
    public $youtube;    
    public $client;
    public $customerFunction;
    const DEVELOPER_KEY = "AIzaSyCVred6qycLlHca6ZsUh-AffUJZnns4Mec";
    // define("DEVELOPER_KEY", "AIzaSyCVred6qycLlHca6ZsUh-AffUJZnns4Mec");
    
    public function __construct() {
        parent::__construct();        
        // $this->CI =& get_instance();

		if($this->session->userdata('sess_email')=='' ) { 
			redirect(base_url("content_management/login"));
		}
	}

    public static function getDeveloperKey()
    {
        return self::DEVELOPER_KEY;
    } 

	public function index()
	{       
        $this->client = new Google_Client(); // Object for gooogle client
        $this->client->setDeveloperKey($this->getDeveloperKey());
        $this->youtube = new Google_Service_Youtube($this->client);   
        $data = array();
     
        $response = $this->youtube->videos->listVideos(
            'snippet, contentDetails, statistics',
            array('chart'=>'mostPopular','maxResults'=>1,'regionCode'=>'ph')
        );             

        $trending_items = $response->items;
        foreach ($trending_items as $key => $item) {
            $statsAndId = array(
                'video' => 'trending_video',
                'stats' => $item->statistics
            );
            
            array_push($data, array('statistics'=> $statsAndId));
        }
        
        $response_channel = $this->youtube->channels->listChannels(
            'snippet, contentDetails, statistics',
            array(
                'id'=>'UCDSD1bcfofufjEhd8XoEr1w',
                'maxResults'=>10,
            )
        ); 

        $trending_items = $response_channel->items;
        foreach ($trending_items as $key => $item) {

            $stats_id_channel = array(
                'video' => 'channel_video',
                'stats' => $item->statistics
            );
            
            array_push($data, array('statistics'=> $stats_id_channel));
        }      
        echo json_encode($data);  
    }
}