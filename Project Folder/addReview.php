<?php # Script 3.4 - addReview.php
include ('includes/session.php');  


//$user =($_GET['user_id']);

$page_title = 'Add Review';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

if (isset($_POST['submitted'])) {

	
     $errors = array();
	if (empty($_POST['review_name'])) {
            $errors[] = 'You forgot to enter the review name.';
    } else {
            $rn = mysqli_real_escape_string($dbc, trim($_POST['review_name']));
    }
     if (empty($_POST['review_type'])) {
            $errors[] = 'You forgot to write the type.';
    } else {
            $rt = mysqli_real_escape_string($dbc, trim($_POST['review_type']));
    }
    // if (empty($_POST['review_file'])) {
         //   $errors[] = 'You forgot to write the review.';
   // } else {
           // $rf = mysqli_real_escape_string($dbc, trim($_POST['review_file']));
   // }
    if (empty($_POST['review_initial_rating'])) {
            $errors[] = 'You forgot to give an initial rating';
    } else {
            $ri = mysqli_real_escape_string($dbc, trim($_POST['review_initial_rating']));
    }
    
    

    
    if (empty($errors)) {//no errors
			$gi = ($_POST['game_id']);
            $ui=($_SESSION['user_id']);
            echo $ui;
            $message=$_POST['message'];
            echo $gi;
            
            $q = "INSERT INTO review(review_name,review_type,review_file,review_initial_rating,review_date) VALUES ('$rn','$rt','$message','$ri',NOW())";
			$result = mysqli_query ($dbc, $q);	
	          

                
			if ($result) { // If it ran OK.
                   
                     $getId = "SELECT review_id FROM review WHERE `review_name` ='$rn'";
            $outcome = mysqli_query ($dbc, $getId);  
                if(mysqli_num_rows($outcome)>0){

                     $rowW = mysqli_fetch_assoc($outcome);
                    $ri = $rowW['review_id'];
                    if($ui!=0 && $ri !=0){
                        $d ="INSERT INTO review_info (game_id,user_id,review_id) VALUES ('$gi','$ui','$ri')";
                            $result1 = mysqli_query ($dbc, $d);
                              echo '<h1>Thank you!</h1>
        <p>The Review was successfully added </p><p><br /></p>';    
                   }else{
                        echo 'user id is null or not able to get';
                   }

                }
                   
                   
                   
                // Print a message:
              

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">Your walkthrough could not be added due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.
          mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();


	}else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.


}//big if

$types = array();


// Make the query:
$q = "SELECT game_id, game_name FROM game_info ORDER BY game_id ASC";       

$result = mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);

if ($num > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }

    mysqli_free_result ($result); // Free up the resources. 
}
mysqli_close($dbc); // Close the database connection.
?>
<div class="page-header">
    <h1>ADD Review</h1>
</div>
<form class="form-signin" role="form" action="addReview.php" method="post">
   
    

    <p>Pick a game: <select name="game_id">
    <?php
    foreach ($types as $type) {
        echo "<option value=\"" . $type['game_id']. "\">" . $type['game_name'] . "</option>\n";
    }
    ?>
    </select></p>
    

    <p>Review Name: <input type="normal" class="form-control" placeholder="best review" required autofocus name="review_name" maxlength="40" value="<?php if (isset($_POST['review_name'])) echo $_POST['review_name']; ?>" /></p>
    
    <p>Review Type: <input type="normal" class="form-control" placeholder="detailed or quick" required name="review_type" maxlength="40" value="<?php if (isset($_POST['review_type'])) echo $_POST['review_type']; ?>" /></p>
    
    <p> Review File:<textarea class='texB' name='message'></textarea></br></p>

    
    <p>Review Initial Rating: <input type="normal" class="form-control" placeholder="put in a number between 1 and 10" required name="review_initial_rating" maxlength="40" value="<?php if (isset($_POST['review_initial_rating'])) echo $_POST['review_initial_rating']; ?>" /></p>
    
    

    
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
</form>
<?php
include ('includes/footer.html');
?>











