<?php
class Controller_Shoppingcart extends Controller_Posts {
    
    public function before() {
        parent::before();
        
        //create database preset
        if(!DBUtil::table_exists('shoppingcart')) {
                \DBUtil::create_table('shoppingcart', array(
                    'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
                    'name' => array('type' => 'text'),
                    'quantity' => array('type' => 'text'),
                ), array('id'));
        }
    }
    
    public function action_index() {

        $this->template->title = 'Brochure Shopping Cart';
        $this->template->content = View::forge('shoppingcart/index');
        
        
    }

}
?>