<?php

class Controller_Admin extends Controller_Posts
{

        public function before()
	{
		parent::before();
		
		if(Auth::check()) {
                    if( ! Auth::member(100)) {
                        Session::set_flash('error', e('You don\'t have an admin account'));
                        Response::redirect('/index.php/posts');
                    }
		}
		//else
		//{
                //    Response::redirect('admin/index');
		//}
        }
        
	public function action_index()
	{
		$this->template->title = 'Dashboard';
		$this->template->content = View::forge('admin/index');
	}
        
        public function action_createPage() {
            if(Auth::check()) {
                if(Input::method() == 'POST') {
                    $page = Model_Attractions::forge(array(
                        'name' => Input::post('name'),
                        'state' => Input::post('state'),
                        'description' => Input::post('description'),
                        'img' => Input::post('img'),
                    ));
                    
                    $page->save();
                    Session::set_flash('success', 'Added page #'.$page->id);
                    Response::redirect('/index.php/attractions/view/'.$page->id);
                }
            }
            else {
                //write error about not logged in
                //redirect them
            }
        
            $this->template->title = 'Create an Attraction';
            $this->template->content = View::forge('admin/createPage');
        
        }
}
/*		
/*
		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if (Auth::check())
			{
				$admin_group_id = Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
				if ( ! Auth::member($admin_group_id))
				{
					Session::set_flash('error', e('You don\'t have access to the admin panel'));
					Response::redirect('/');
				}
			}
			else
			{
				Response::redirect('admin/login');
			}
		*/

// 	public function action_login()
// 	{
// 		// Already logged in
// 		Auth::check() and Response::redirect('admin');
// 
// 		$val = Validation::forge();
// 
// 		if (Input::method() == 'POST')
// 		{
// 			$val->add('email', 'Email or Username')
// 			    ->add_rule('required');
// 			$val->add('password', 'Password')
// 			    ->add_rule('required');
// 
// 			if ($val->run())
// 			{
// 				if ( ! Auth::check())
// 				{
// 					if (Auth::login(Input::post('email'), Input::post('password')))
// 					{
// 						// assign the user id that lasted updated this record
// 						foreach (\Auth::verified() as $driver)
// 						{
// 							if (($id = $driver->get_user_id()) !== false)
// 							{
// 								// credentials ok, go right in
// 								$current_user = Model\Auth_User::find($id[1]);
// 								Session::set_flash('success', e('Welcome, '.$current_user->username));
// 								Response::redirect('admin');
// 							}
// 						}
// 					}
// 					else
// 					{
// 						$this->template->set_global('login_error', 'Login failed!');
// 					}
// 				}
// 				else
// 				{
// 					$this->template->set_global('login_error', 'Already logged in!');
// 				}
// 			}
// 		}
// 
// 		$this->template->title = 'Login';
// 		$this->template->content = View::forge('admin/login', array('val' => $val), false);
// 	}
// 
// 	/**
// 	 * The logout action.
// 	 *
// 	 * @access  public
// 	 * @return  void
// 	 */
// 	public function action_logout()
// 	{
// 		Auth::logout();
// 		Response::redirect('admin');
// 	}
// 
// 	/**
// 	 * The index action.
// 	 *
// 	 * @access  public
// 	 * @return  void
// 	 */


/* End of file admin.php */
