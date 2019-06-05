
<?php echo 'You must be logged in as administrator for these buttons to work' ?>
<?php echo Form::open(array('action' => 'index.php/migrations/index', 'method' => 'post'));
        echo Form::label('Up', 'migrate');
        echo ' ';
        echo Form::radio('migrate', 'Up');
        echo ' ';
        
        echo Form::label('Down', 'migrate');
        echo ' ';
        echo Form::radio('migrate', 'Down');
        echo '<br>';
        
        echo Form::label('Enter Migration file number to take action on (1, 2, or 3): <br>');
        echo Form::input('num', '', array('style' => 'border:2px:'));
        
        echo '<br>OR<br>';
        echo Form::label('Update to Current', 'migrate');
        echo ' ';
        echo Form::radio('migrate', 'Update to Current');
        
        echo '<br>';
        echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary'));
        echo Form::close(); 
        
        echo '**Note: Do NOT drop table tests in database. This will break the system. If this is done, please drop table migration and drop table tests, and also delete migrations.php from ~/fuel/app/config/development <br><br>';
?>
        
<?php 
        if(!empty($show_migration)) {
            foreach($show_migration as $migration) {
                echo $migration['Create Table'];
            }
        }
?>

<?php
    echo '<br><br>';
    if(!empty($show_status)) {
        foreach($show_status as $status) {
            echo 'Version Number: ' . $status->version_num . '<br>';
            echo 'Name: ' . $status->name . '<br>';
            echo 'Status: ' . $status->status . '<br>';
        }
    }

?>