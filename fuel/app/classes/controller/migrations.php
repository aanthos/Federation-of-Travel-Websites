<?php
class Controller_Migrations extends Controller_Posts {
    
    public function action_index() {
        $data = array();
        
        
        if(Auth::check()) {
            if(Auth::member(100)) {
                if(Input::post()) {
                        $migrate_action = Input::post('migrate');
                        $migrate_number = Input::post('num');
                        
                        if($migrate_action === 'Up') {
                            //echo $migrate_action;
                            //echo $migrate_number;
                            Migrate::version($migrate_number);
                            Migrate::up($migrate_number);
                            DB::update('migrationstatus')->value('status', 'run')->where('id', '=', $migrate_number)->execute();
                        }
                        
                        if($migrate_action === 'Down') {
                            //echo $migrate_action;
                            //echo $migrate_number;
                            Migrate::version($migrate_number);
                            Migrate::down();
                            DB::update('migrationstatus')->value('status', 'unrun')->where('id', '=', $migrate_number)->execute();
                        }
                        
                        if($migrate_action === 'Update to Current') {
                            //echo 'update'; for debugging
                                Migrate::version('3');
                                Migrate::up();
                                DB::update('migrationstatus')->value('status', 'run')->where('status', '=', 'unrun')->execute();
                                
                                
                        }
                    }
                }
            }
            
            $show_migration = '';
            if(\DBUtil::table_exists('tests')) {
                $show_migration = DB::query('SHOW CREATE TABLE tests')->execute();
            }
            
                $show_status = Model_Migrationstatus::find('all');
                //DB::query('SELECT * FROM migrationstatus')->execute();
        
        $this->template->title = 'Migrations';
        $this->template->content = View::forge('migrations/index', $data);
        $this->template->content->set_safe('show_migration', $show_migration);
        $this->template->content->set_safe('show_status', $show_status);
    }
    
    
    
}

?>