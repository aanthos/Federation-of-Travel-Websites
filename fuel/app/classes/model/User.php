<?php

namespace Model;


class Model_Posts extends \Orm\Model {
    //username access level e-mail initial pass hash
    protected static $_properties = array(
        'id',
        'username',
        'group',
        'email',
        'pass_hash',
        );
        
        
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
            
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );    
    
    protected static $_table_name = 'users';
    
    
    
}

?>