<?php

class Controller_Posts extends Controller_Template{
        public function before() {
            parent::before();
            
            if(!DBUtil::table_exists('users')) {
                \DBUtil::create_table('users', array(
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
            }
            
            $size = count(DB::select('*')->from('users')->execute());
            
            if($size == 0) {
                    Auth::create_user('aaronper', 'aaron', 'aaronper@cs.colostate.edu', 1);
                    Auth::create_user('aaronadmin', 'aaronadmin', 'Aaron.Pereira@colostate.edu', 100);
                    Auth::create_user('bsay', 'forgot', 'bsay@cs.colostate.edu', 1);
                    Auth::create_user('ct310', 'password', 'ct310@cs.colostate.edu', 100);
                    Auth::create_user('anthos', 'aaron', 'athovla@gmail.com', 100);
                    
                    //DB::update('users')->value('password', 'a6cebbf02cc311177c569525a0f119d7')->where('username', '=', 'ct310')->execute();
                    //DB::update('users')->value('password', '449a36b6689d841d7d27f31b4b7cc73a')->where('username', '=', 'aaronper')->execute();
                    //DB::update('users')->value('password', '790f6b6cf6a6fbead525927d69f409fe')->where('username', '=', 'bsay')->execute();
                    //DB::update('users')->value('password', 'd31bfd85d0a81046f70304ebfecdffbf')->where('username', '=', 'aaronadmin')->execute();
            }
            
            $this->current_user = null;

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
			}
			break;
		}

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
            
        }
	public function action_index() {
		$data = array();
		$session = Session::instance(); 
		$username = $session->get('username');     
		
		$this->template->title = 'Welcome!';
		$this->template->content = View::forge('posts/index', $data);
	}
	public function action_add() {
		$data = array();
		$this->template->title = 'Add';
		$this->template->content = View::forge('posts/add', $data);
	}	
		public function action_twine() {
		$data = array();
		$this->template->title = 'Largest Twine Ball in the World';
		$this->template->content = View::forge('posts/twine', $data);
		}
	public function action_zoo() {
		$data = array();
		$this->template->title = 'Safari Zoological Park';
		$this->template->content = View::forge('posts/zoo', $data);
	}
	public function action_gardenofeden() {
		$data = array();
		$this->template->title = 'Garden of Eden';
		$this->template->content = View::forge('posts/gardenofeden', $data);
	}
	
	public function action_aboutus() {
		$data = array();
		$this->template->title = 'About Us';
		$this->template->content = View::forge('posts/aboutus.php', $data);
	}
	
	public function action_login(){
		$data = array();
		$status = 'success';
		
		$this->template->title = 'Login';
		$this->template->content = View::forge('posts/loginForm', $data);
		$this->template->content->set_safe('status',$status);

		
	}
	public function action_checkLogin()
	{
	
		$data = array();
		$username = Input::post('username');
		$password = Input::post('password');

		if(Input::post())
		{
                    if(Auth::login($username, $password) || Auth::login($username, md5($password))) {
                        Session::create();
                        Session::set('username', $username);
                        Session::set('userid', 12345);
                        
                        $this->template->title = 'Login';
                        $this->template->content = View::forge('posts/success', $data);
                    }
                    
                    else
                    {
                        $this->template->title = 'Login';
                        $this->template->content = View::forge('posts/loginForm', $data);
                        $this->template->content->set_safe('status', 'error');
                    }
		}
	
	}
	
	public function action_logout()
	{
		$data = array();
		$session = Session::instance(); 
		$session->destroy();
		$this->template->login='Login';
		$this->template->title = 'Logout';
		$this->template->content = View::forge('posts/logout', $data);
		

		
	}
	
	public function action_changePass() {
	
            $this->template->title = 'Change Password';
            $this->template->content = View::forge('posts/changePass');

            
	}
	
	public function action_recoverPass() {
            
            if(Input::method() == 'POST') {
                    DB::update('users')->value('password', md5(Input::post('password')))->where('email', '=', Input::post('email'))->execute();
                    Auth::change_password(Input::post('password'), Input::post('password'), Input::post('user'));
            }

            $this->template->title = 'Recover your Password';
            $this->template->content = View::forge('posts/recoverPass');
            
            
	}
	
}
