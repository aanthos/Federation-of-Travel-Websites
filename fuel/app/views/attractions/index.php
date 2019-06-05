

<?php foreach($attractions as $attraction): ?>

    <h3><?php echo Html::anchor('index.php/attractions/view/'.$attraction->id, $attraction->name) ?></h3>
    <p><?php echo $attraction->description ?></p>

<?php endforeach; ?>