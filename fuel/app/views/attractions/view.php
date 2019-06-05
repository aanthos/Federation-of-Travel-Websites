<?php echo Asset::img( $page->img, array('id' => $page->id, 'width' => '100%', 'height' => '100%', 'align' => 'middle')); ?>



<!--<p id=infot><?php// $page->name?> - Image from <a href="<?php// echo $page->imgsrc ?>"> <?php// echo $page->imgsrc ?> </a> </p>-->

<p id ='infot'><?php $page->name?>
<p id='infot'>
<?php echo $page->description ?>
</p>

<h3 id="comments"> Comments</h3>
<?php foreach ($comments as $comment): ?>
    <p><?php echo $comment->message ?></p>

    <?php endforeach; ?>

<?php echo Form::open(array('action' => '/index.php/attractions/view/'.$page->id, 'method' => 'post')); ?>
    <fieldset>
        <div class="form-group">
            <?php echo Form::textarea('comment', '', array('rows' => 6, 'cols' => 8)); ?>
        </div>
        
        <div class="actions">
            <?php echo Form::submit('submit', 'Submit', array('class' => 'btn btn-primary')); ?>
        </div>
    <fieldset>
<?php echo Form::close(); ?>