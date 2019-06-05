<?php echo Asset::img('lion.jpg', array('id' => 'lion')); ?>
<p id=infot>Sammy the Lion - Image from <a href="https://www.tripadvisor.com/Attraction_Review-g38607-d2707230-Reviews-Safari_Zoological_Park-Caney_Kansas.html#photos;aggregationId=101&albumid=101&filter=7&ff=264747873"> www.tripadvisor.com </a> </p>

<p id = zinfo> 
Safari Zoological Park is a private zoo and animal rescue facility located in the city of Caney, Kansas. Safari Zoological Park offers multiple exhibits including, but not limited to: Tigers, Tiger Pups, Lions, Bears, Cats, Primates, Wolves. Safari Zoological Park's mission statement is to "showcase the awesomeness of our God in the individua wonder and uniqueness of all His creation.
</p>
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

