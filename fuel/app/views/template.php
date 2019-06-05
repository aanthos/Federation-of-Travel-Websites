<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title;?></title>

    <!-- Bootstrap core CSS -->

	<?php echo Asset::css('bootstrap.min.css'); ?>
    <!-- Custom styles for this template -->
  
	<?php echo Asset::css('style.css'); ?>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark  bg-dark fixed-top" style="background-color: #e3f2fd;" >
      <a class="navbar-brand" href="http://www.cs.colostate.edu/~anthos/ct310/">BUBBA'S ROADTRIP CO.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=Uri::create('index.php/posts/index.php'); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=Uri::create('index.php/posts/aboutus.php'); ?>">About us</a>
          </li>
          
            <li class="nav-item">
                <a class="nav-link" href="<?=Uri::create('index.php/attractions'); ?>">Attractions</a>
            </li>
  
         <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="twine.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Attractions</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?=Uri::create('index.php/posts/twine.php'); ?>">Largest Ball of Twine</a>
              <a class="dropdown-item" href="<?=Uri::create('index.php/posts/zoo.php'); ?>">Safari Zoological Park</a>
	      <a class="dropdown-item" href="<?=Uri::create('index.php/posts/gardenofeden.php'); ?>">Garden of Eden</a>
	     
            </div>
          </li>-->
        </ul>
        
        <ul class="navbar-nav" style="float:right;">
            <li class="nav-item">
                <a class="nav-link" href="<?=Uri::create('index.php/shoppingcart/index.php'); ?>">Cart</a>
            </li>
        </ul>
        
        <ul class="navbar-nav" style="float:right;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?=Uri::create('index.php/admin/index.php'); ?>">Dashboard</a>
                    <a class="dropdown-item" href="<?=Uri::create('index.php/admin/createPage.php'); ?>">Create Attraction</a>
	     
            </div>
          </li>
        </ul>
        
		<ul class="navbar-nav" style="float:right;">
          <li class="nav-item active">
		<?php
		$session = Session::instance(); 
		$username = $session->get('username');
		?>
         <?php if (isset($username)): ?>
			<a class="nav-link" href="<?=Uri::create('index.php/posts/logout.php'); ?>">Logout<span class="sr-only">(current)</span></a>
		<?php else: ?>
			<a class="nav-link" href="<?=Uri::create('index.php/posts/login.php'); ?>">Login<span class="sr-only">(current)</span></a>
							
		  <?php endif; ?> 
      </div>
    </nav>

    <main role="main" class="container">

      <div class="infocontainer">
      <h1><?php echo $title; ?></h1>
	
	<?php echo $content; ?> 
    </main><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<?php echo Asset::js('jquery-3.2.1.slim.min.js'); ?>
<?php echo Asset::js('popper.min.js'); ?>
<?php echo Asset::js('bootstrap.min.js'); ?>
  </body> 
<div class="footer" id ="footing">
<footer> This site is part of a CSU <a href="https://www.cs.colostate.edu/~ct310/yr2018sp/index.php">CT310</a> Course Project. </footer>
</div>
</html>
