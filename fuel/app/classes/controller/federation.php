<?php
class Controller_Federation extends Controller_Posts {
	public function action_status() {
		$data = array();     
		$status = array('status' => 'open');
		
		$this->template->title = 'Federation Page';
		$this->template->content = View::forge('federation/status', $data);
		
		return Format::forge($status)->to_json();
	}
	
	public function action_allstatus() {

            $curl = Request::forge('https://www.cs.colostate.edu/~ct310/yr2018sp/master.json', 'curl');
            $result = $curl->execute();
            $json = json_decode($result, true);
 
            $size = sizeof($json);

            for($i = 0; $i < $size; $i++) {
                $eid_url = 'http://www.cs.colostate.edu/~'. $json[$i]['eid'] .'/ct310/index.php/federation/status';
                $sub_curl = Request::forge($eid_url, 'curl');
                $url_headers = get_headers($eid_url);
                
                if($url_headers[0] === 'HTTP/1.1 200 OK') { 
                    $sub_result = $sub_curl->execute();
                    
                    $json_status = json_decode($sub_result, true);
                    try {
                        $json[$i]['status'] = $json_status['status']; 
                    } catch (Exception $e) {
                        $json[$i]['status'] = 'unresponsive';
                    }
                }
                
                else {
                    $json[$i]['status'] = 'unresponsive';
                }
                
                if($json[$i]['status'] == '') {
                    $json[$i]['status'] = 'unresponsive';
                }
                
            }
            
        
            $this->template->title = 'All Status';
            $this->template->content = View::forge('federation/allstatus');
            $this->template->content->set_safe( 'json_view', $json); //give to view
            $this->template->content->set_safe('size', $size); //give json object list size
    }
        
    public function action_listing() {
        //check to see if attractions db exists
        if(DBUtil::table_exists('attractions')) {
            
            $attractions = Model_Attractions::find('all');
            $listings = array();
            
            foreach($attractions as $attraction) {
                $listings[] = array('id' => $attraction->id,
                                    'name' => $attraction->name,
                                    'state' => $attraction->state);
            }
            
            //echo print_r($listings[0], true); for debugging
        }
        
        return Format::forge($listings)->to_json();
        
//         $this->template->title = 'Listings';
//         $this->template->content = View::forge('federation/listing');
    }
    
    public function action_attraction($id) {
        $page = Model_Attractions::find('first', array('where' => array('id' => $id)));
        $details = array('id' => $page->id,
                         'name' => $page->name,
                         'desc' => $page->description,
                         'state' => $page->state,
                         );
        
        return Format::forge($details)->to_json();
    }
    
    public function action_attrimage($id) {
        $picture = Model_Attractions::find('first', array('where' => array('id' => $id)));
        $pic = $picture->img;
        $response = Response::forge(file_get_contents(Asset::get_file($pic, 'img')));
        $response->set_header('Content-Type', 'image/jpeg');
        return $response;
        
    }
    
    public function action_getattractions(){
        
//         $curl = Request::forge('https://www.cs.colostate.edu/~ct310/yr2018sp/master.json', 'curl');
//         $result = $curl->execute();
//         $json = json_decode($result, true);
//  
//         $size = sizeof($json);
// 
//         for($i = 0; $i < $size; $i++) {
//             $eid_url = 'http://www.cs.colostate.edu/~'. $json[$i]['eid'] .'/ct310/index.php/federation/status';
//             $sub_curl = Request::forge($eid_url, 'curl');
//             $url_headers = get_headers($eid_url);
//                 
//             if($url_headers[0] === 'HTTP/1.1 200 OK') { 
//                 $sub_result = $sub_curl->execute();
//                     
//                 $json_status = json_decode($sub_result, true);
//                 try {
//                     $json[$i]['status'] = $json_status['status']; 
//                 } catch (Exception $e) {
//                     $json[$i]['status'] = 'unresponsive';
//                 }
//             }
//                 
//             else {
//                 $json[$i]['status'] = 'unresponsive';
//             }
//                 
//             if($json[$i]['status'] == '') {
//                 $json[$i]['status'] = 'unresponsive';
//             }
//             
//             
//             $curl2 = Request::forge('https://www.cs.colostate.edu/~'. $json[$i]['eid'] .'/ct310/index.php/federation/listing', 'curl');
//             $result2=$curl2->execute();
//             $json2 = json_decode($result2, true);
//             
//             
//             $size3 = sizeof($json2);
//             
//             $json_listing = [];
//             for($j = 0; $j < $size3; $j++) {
//                 array_push($json_listing,array("eid" => $json[$i]['eid'], "shortname" => $json[$i]['nameShort'],"name" => $json2[$j]['name'], "state" => $json2[$j]['state'],"attractionid" => $json2[$j]['id'] ));
//                  
//             }
//         }
//         
//         $size2 = sizeof($json_listing);
//         
//         $this->template->title = 'Get Attractions';
//         $this->template->content = View::forge('federation/getattractions');
//         $this->template->content->set_safe( 'json_view', $json); //give to view
//         $this->template->content->set_safe('size', $size); //give json object list size
//         $this->template->content->set_safe( 'json_list', $json_listing); //give to view
//         $this->template->content->set_safe('size2', $size2); //give json object list size

            //$layout = View::forge('template.php');
            //$content = View::forge('federation/getattractions');
            $this->template->title = 'Get Attractions';
            $this->template->content = View::forge('federation/getattractions');
            
            $curl = Request::forge('https://www.cs.colostate.edu/~ct310/yr2018sp/master.json', 'curl');
            $result=$curl->execute();
            $json = json_decode($result, true);
            $size =  sizeof($json); //44
           
            //$json_statuses = [];
            $json_listing = [];
            for($i = 0; $i < $size; $i++) { 
                $eid_url = 'http://www.cs.colostate.edu/~'. $json[$i]['eid'] .'/ct310/index.php/federation/status';
                $sub_curl = Request::forge($eid_url, 'curl');
                $url_headers = get_headers($eid_url);
                
                if($url_headers[0] === 'HTTP/1.1 200 OK') { 
                    $sub_result = $sub_curl->execute();
                    
                    $json_status = json_decode($sub_result, true);
                    try{$json[$i]['status'] = $json_status['status'];
                    }catch (Exception $e){ $json[$i]['status'] = 'unresponsive';}
                }
                
                else {
                    $json[$i]['status'] = 'unresponsive';
                }
                
                if($json[$i]['status'] == '') {
                    $json[$i]['status'] = 'unresponsive';
                }
                
                if($json[$i]['status'] == 'open'){
                    $curl2 = Request::forge('https://www.cs.colostate.edu/~'. $json[$i]['eid'] .'/ct310/index.php/federation/listing', 'curl');
                    $result2=$curl2->execute();
                    $json2 = json_decode($result2, true);
                    $size3 = sizeof($json2);
                    for($j = 0; $j < $size3; $j++) {
                            array_push($json_listing,array("eid" => $json[$i]['eid'], "shortname" => $json[$i]['nameShort'],"name" => $json2[$j]['name'], "state" => $json2[$j]['state'],"attractionid" => $json2[$j]['id'] ));
                 
                    }
                
                
                
            }}
            $size2 = sizeof($json_listing);
            $this->template->content->set_safe( 'json_view', $json); //give to view
            $this->template->content->set_safe('size', $size); //give json object list size
            $this->template->content->set_safe( 'json_list', $json_listing); //give to view
            $this->template->content->set_safe('size2', $size2); //give json object list size
                
//             $content->set_safe( 'json_list', $json_listing); //give to view
//             $content->set_safe('size2', $size2); //give json object list size
//                 
//             $content->set_safe( 'json_view', $json); //give to view
//             $content->set_safe('size', $size); //give json object list size
//             
//             //print_r($json_listing);
//             return $content;
        
    }
    
    public function action_viewattraction($eid, $id){//eid / attraction # 
    
        //DESCRIPTION//TODO TAKE name, desc, state from here + add in img/eid/shortname later 
        $curl3 = Request::forge('https://www.cs.colostate.edu/~' . $eid . '/ct310/index.php/federation/attraction/' . $id, 'curl');
        $result3 = $curl3->execute();
        $json_attraction = json_decode($result3, true);
        
        //IMAGE
        $json_image  = 'https://www.cs.colostate.edu/~'. $eid.'/ct310/index.php/federation/attrimage/'.$id;
        
        
        $this->template->title = "View Attraction";
        $this->template->content = View::forge('federation/viewattraction');
        $this->template->content->set_safe('json_image', $json_image);
        $this->template->content->set_safe('json_att', $json_attraction); //give to view
        
        }
    
    
}
?>
