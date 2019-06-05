<?php
namespace Model;

class User extends \Model {
    //protected static $_has_many = array('posts', 'comments');         //uncomment if using Orm
    //protected static $_belongs_to = array('user');                    //uncomment if using Orm
    public static function exists() {
    //create table for use with SimpleAuth
    if(! \DBUtil::table_exists('users')) 
    {
            \DBUtil::create_table(
                'users',
                array(
                    'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
                    'username' => array('type' => 'text'),
                    'password' => array('constraint' => 125, 'type' => 'varchar'),
                    'group' => array('constraint' => 50, 'type' => 'varchar'),
                    'email' => array('constraint' => 50, 'type' => 'varchar'),
                    'last_login' => array('constraint' => 11, 'type' => 'int'),
                    'login_hash' => array('constraint' => 50, 'type' => 'varchar'),
                    'profile_fields' => array('constraint' => 50, 'type' => 'varchar'),
                    'created_at' => array('constraint' => 11, 'type' => 'int'),
                    'updated_at' => array('constraint' => 11, 'type' => 'int'),
                    'recovery_key' => array('constraint' => 50, 'type' => 'varchar')
                    ), array('id'));
            
            \Auth::create_user('aaronper','aaron','aaronper@cs.colostate.edu', 1); 
            \Auth::create_user('aaronadmin','aaronadmin','Aaron.Pereira@colostate.ed', 100); 
            \Auth::create_user('bsay','forgot','bsay@cs.colostate.edu', 1); 
            \Auth::create_user('ct310','password','ct310@cs.colostate.edu', 100); 
            # Note: 'password' is temporary for ct310
            
            //if Auth doesn't work above, use:
            //DB::insert('users')->columns(array('username', 'password', 'email', 'group'))->values(array('aaronper', 'temppass', 'aaronper@cs.colostate.edu', 1))->execute();
            
            
    }
    }
    
    
}

?>