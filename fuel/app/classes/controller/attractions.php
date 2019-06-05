<?php
class Controller_Attractions extends Controller_Posts {
    
//     public function before() {
//         parent::before();
//         
//         //fill in preset attractions from DB
//         if(!DBUtil::table_exists('attractions')) {
//                 \DBUtil::create_table('attractions', array(
//                     'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
//                     'slug' => array('type' => 'text'),
//                     'title' => array('type' => 'text'),
//                     'image' => array('type' => 'text'),
//                     'imgsrc' => array('type' => 'text'),
//                     'summary' => array('type' => 'text')
//                 ), array('id'));
//         }
//         
//         if(!DBUtil::table_exists('comments')) {
//                 \DBUtil::create_table('comments', array(
//                     'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
//                     'attraction' => array('type' => 'text'),
//                     'name' => array('type' => 'text'),
//                     'message' => array('type' => 'text'),
//                     'message_id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
//                     'created_at' => array('type' => 'text')
//                 ), array('id'));
//         }
//         
//         $size = count(DB::select('*')->from('attractions')->execute());
//         
//         if($size == 0) {
//             $page = Model_Attractions::forge(array(
//                 'slug' => 'lion',
//                 'title' => 'Safari Zoological Park',
//                 'image' => 'lion.jpg',
//                 'imgsrc' => 'https://www.tripadvisor.com/',
//                 'summary' => 'Safari Zoological Park is a private zoo and animal rescue facility located in the city of Caney, Kansas. Safari Zoological Park offers multiple exhibits including, but not limited to: Tigers, Tiger Pups, Lions, Bears, Cats, Primates, Wolves. Safari Zoological Park mission statement is to showcase the awesomeness of our God in the individua wonder and uniqueness of all His creation.',
//             ));
//             $page->save();
//             
//             $page = Model_Attractions::forge(array(
//                 'slug' => 'twine',
//                 'title' => 'Ball of Twine',
//                 'image' => 'twine.jpg',
//                 'imgsrc' => 'http://www.kansastravel.org/',
//                 'summary' => 'The one and only, most incredible, largest ball of Twine in the world. Located in Cawker City, Kansas. It is free for all to see, 24 hours a day, 7 days a week. The ball began its journey back in 1953 when Frank Stoeber started it. Within 4 years it stood over 8 feet tall and weighed 5,000 pounds. As of September 2013, it weighed 19,873 pounds. Stoeber gave the giant ball to Cawker City, Kansas back in 1961. You may wonder how the giant ball becamse so giant! Well, its not that theres some crazy twiners adding to it (though maybe there are!). Each August, Cawker City holds a twine-a-thon that allows residents and tourists to add more twine to the giant ball! So if you want to see one of the largest balls in the world, come to Cawker City, Kansas and get your twine on!',
//             ));
//             $page->save();
//             
//             $page = Model_Attractions::forge(array(
//                 'slug' => 'eden',
//                 'title' => 'Garden of Eden',
//                 'image' => 'gardenofeden.jpg',
//                 'imgsrc' => 'http://www.kansastravel.org/',
//                 'summary' => 'S.P. Dinsmoor, a retired schoolteacher and Civil War veteran, began building a unique 11-room log cabin, with logs up to 27 feet long in 1891. In 1907, he finished and then began building the garden that would surround his him for the next 22 years. This garden was built from 113 tons of concrete and limestone, telling the story of the worlds creation. There is plenty of variety to see and experience, from the 150 and more figures, various insects, and 40 foot-tall trees. Although the open hours at the Garden of Eden are limited, many of the attractions this has to offer can be seen from the outside as well. It is certainly a worthwhile visit!',
//             ));
//             $page->save();
//             
//         }
// 
//         
//         
//     }
    
    public function action_index()
    {
        $view = View::forge('attractions/index'); //place links to all attractions here
        $view->attractions = Model_Attractions::find('all');
        
        $this->template->title = 'All Attractions';
        $this->template->content = $view;
    }
    
    public function action_view($id) {
        $page = Model_Attractions::find('first', array('where' => array('id' => $id)));
        
        if(DBUtil::table_exists('comments')) {
        
            //$comments = DB::select()->from('comments')->where('attraction', $id)->execute();
        
            $comments = Model_Comments::find('all', array(
                'where' => array(
                    array('attraction', $id)  
            )));
            
            if(Auth::check()) {
                if(Input::method() == 'POST') {
                    $comment = Model_Comments::forge(array(
                        'attraction' => $id,
                        'name' => 'name', //$this->current_user->username,
                        'message' => Input::post('comment'),
                    ));
                
                    $comment->save();
                    Response::redirect('/index.php/attractions/view/' . $id);
                }
            
                else {
                //write error about user not being logged in
                //$this->action_view($slug);
                }
            }
        }
        
        $this->template->title = $page->name;
        $this->template->content = View::forge('attractions/view', array(
            'page' => $page,
            'comments' => $comments,
        ));
    }
    
}
    
?>
