
<?php echo Asset::img('twine.jpg', array('id' => 'twine')); ?>
<p id=infot>Largest Ball of Sisal Twine - Image from <a href="http://www.kansastravel.org/balloftwine.htm"> www.kansastravel.org </a> </p>
<p id =minfo> The one and only, most incredible, largest ball of Twine in the world. Located in Cawker City, Kansas. It is free for all to see, 24 hours a day, 7 days a week. The ball began its journey back in 1953 when Frank Stoeber started it. Within 4 years it stood over 8 feet tall and weighed 5,000 pounds. As of September 2013, it weighed 19,873 pounds. Stoeber gave the giant ball to Cawker City, Kansas back in 1961. You may wonder how the giant ball becamse so giant! Well, it's not that theres some crazy twiners adding to it (though maybe there are!). Each August, Cawker City holds a <b>twine-a-thon</b> that allows residents and tourists to add more twine to the giant ball! So if you want to see one of the largest balls in the world, come to Cawker City, Kansas and get your twine on! </p>

   <form name="commentbox" method="post" id = 'tinput' action="zoo.php">
        <textarea name="field" rows="5"></textarea>
        <input type="hidden" value="done" name="comment_in">
        <input type="submit" id = "but" value="Comment">
    </form>
    
 <?php
	
	$session = Session::instance(); 
	$username = $session->get('username');
	
    if (isset($username)) {
        if(isset($_POST['comment_in'])) {
            $commentstr = filter_var($_POST['field'], FILTER_SANITIZE_STRING);
            
            if(empty($_POST['field'])) {
                //add div for formatting here
                echo '<p>Empty comment. Please try again.</p>';
                
            }
            
            else {
                //div for formatting
                echo "<p>" . $commentstr . "<p>";
                //maybe div for date
                echo "<p>" . date("Y-m-d h:i:sa") . "</p>";
            }
        }
	}
	else {
        echo "<p> Please login to post comments.<p>";
    }    
	
?>
