
<?php echo Form::open(array('action' => '/index.php/admin/createPage', 'method' => 'post')); ?>
    <fieldset>
        <div class="form-group">
            <?php echo Form::label('Name'); ?>
            <?php echo Form::input('name', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('State'); ?>
            <?php echo Form::input('state', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('Image (Enter image filename from assets/img)'); ?>
            <?php echo Form::input('img', ''); ?>
        </div>
        
        <div class="form-group">
            <?php echo Form::label('Summary of Attraction'); ?>
            <?php echo Form::textarea('description', '', array('rows' => 6, 'cols' => 8)); ?>
        </div>
        
        <div class="actions">
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    <fieldset>
<?php echo Form::close(); ?>