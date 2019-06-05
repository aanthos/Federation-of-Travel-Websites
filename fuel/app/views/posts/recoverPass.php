
<?php echo Form::open(array('action' => '/index.php/posts/recoverPass', 'method' => 'post')); ?>
    <fieldset>
        
        <div class="form-group">
            <?php echo Form::label('Enter your username:'); ?>
            <?php echo Form::input('user', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('Enter your email:'); ?>
            <?php echo Form::input('email', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('Enter your new password:'); ?>
            <?php echo Form::input('password', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('Confirm your new password:'); ?>
            <?php echo Form::input('confirmpassword', ''); ?>
        </div>
        
        <div class="actions">
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    <fieldset>
<?php echo Form::close(); ?>