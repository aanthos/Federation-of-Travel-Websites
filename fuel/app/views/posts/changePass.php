
<?php echo Form::open(array('action' => '/index.php/posts/changePass', 'method' => 'post')); ?>
    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Enter your Email:'); ?>
            <?php echo Form::input('email', ''); ?>
        </div>
        
        <div class="actions">
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    <fieldset>
<?php echo Form::close(); ?>

<?php
if(isset($_POST['email'])) {
                        $msg = 'Visit http://www.cs.colostate.edu/~anthos/ct310/index.php/posts/recoverPass.php to reset your password!';
                        $msg = wordwrap($msg, 70);
                        mail($_POST['email'], "CT310 Project: Password Recovery", $msg);
                }
?>