



<?php echo Form::open(array('action' => '/index.php/shoppingcart/index', 'method' => 'post')); ?>
        <div class="form-group">
            <?php echo Form::label('Enter your Email to Checkout:'); ?>
            <?php echo Form::input('email', ''); ?>
            <br>
            <?php echo Form::label('Number of Brochures Desired: '); ?>
            <?php echo Form::input('num', ''); ?>
            <br>
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>


<?php echo Form::close(); ?>

<?php 
            if(isset($_POST['email'])) {
                if(isset($_POST['num'])) {
                    echo 'You will be receiving an email soon!';
                    $msg = 'You will be receiving your brochure soon!';
                    $msg = wordwrap($msg, 70);
                    for($i = 0; $i < (int) $_POST['num']; $i++) {
                        mail($_POST['email'], "Travel Brochure on the Way", $msg);
                    }
                }
                
                else {
                    echo 'Please enter number of brochures desired';
                }
        }
        
?>