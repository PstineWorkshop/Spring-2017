<?php # Script 3.4 - addWalkthrough.php
include ('includes/session.php');  


//$user =($_GET['user_id']);

$page_title = 'Add Walkthrough';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

if (isset($_POST['submitted'])) {

	
     $errors = array();
	if (empty($_POST['walkthrough_name'])) {
            $errors[] = 'You forgot to enter the walkthrough name.';
    } else {
            $wn = mysqli_real_escape_string($dbc, trim($_POST['walkthrough_name']));
    }
     if (empty($_POST['walkthrough_type'])) {
            $errors[] = 'You forgot to write the type.';
    } else {
            $wt = mysqli_real_escape_string($dbc, trim($_POST['walkthrough_type']));
    }
    // if (empty($_POST['walkthrough_file'])) {
     //       $errors[] = 'You forgot to mention if the game is an exclusive.';
   // } else {
   //         $wf = mysqli_real_escape_string($dbc, trim($_POST['walkthrough_file']));
   // }
   
    
    

    
    if (empty($errors)) {//no errors
			$gi = ($_POST['game_id']);
            

            $ui=($_SESSION['user_id']);
            
             $message=$_POST['message'];
            
            $q = "INSERT INTO walkthrough (walkthrough_name,walkthrough_type,walkthrough_file,walkthrough_date) VALUES ('$wn','$wt','$message',NOW())";
			$result = mysqli_query ($dbc, $q);	
	          

                
			if ($result) { // If it ran OK.
                   
                    $getId = "SELECT walkthrough_id FROM walkthrough WHERE walkthrough_name ='$wn'";
            $outcome = mysqli_query ($dbc, $getId);  
                if(mysqli_num_rows($outcome)>0){

                    $rowW = mysqli_fetch_assoc($outcome);
                    $wi = $rowW['walkthrough_id'];
                    
                     if($ui!=0 && $wi !=0){
                        $d ="INSERT INTO walkthrough_info (game_id,user_id,walkthrough_id) VALUES ('$gi','$ui','$wi' )";
                            $result1 = mysqli_query ($dbc, $d);

                             echo '<h1>Thank you!</h1>
        <p>The walkthrough was successfully added </p><p><br /></p>';   
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
$types1= array();


$w = "SELECT user_id FROM users WHERE user_id=$user";

$result2 =mysqli_query($dbc, $w);

$num1 =mysqli_num_rows($result2);

if ($num1 > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result2)) {
        $types1[] = $row;
    }

    mysqli_free_result ($result2); // Free up the resources. 
}

// Make the query:
$q = "SELECT game_id, game_name FROM game_info ORDER BY game_name ASC";       

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
    <h1>ADD Walkthrough</h1>
</div>
<form class="form-signin" role="form" action="addWalkthrough.php" method="post">
    
	

   
    

    <p>Pick a game: <select name="game_id" >
    <?php
    foreach ($types as $type) {
        echo "<option value=\"" . $type['game_id']. "\">" . $type['game_name'] . "</option>\n";
    }
    ?>
        </select></p>
    

    <p>Walthrough Name: <input type="normal" class="form-control" placeholder="best walkthrough" required autofocus name="walkthrough_name" maxlength="40" value="<?php if (isset($_POST['walkthrough_name'])) echo $_POST['walkthrough_name']; ?>" /></p>
    
    <p>Walthrough Type: <input type="normal" class="form-control" placeholder="General or In Depth" required name="walkthrough_type" maxlength="40" value="<?php if (isset($_POST['walkthrough_type'])) echo $_POST['walkthrough_type']; ?>" /></p>
    
    <p> Walkthrough File:<textarea class='texB' name='message'></textarea></br></p>

   <!-- <p>Walkthrough File: <input type="text" style ="height:100px;font-size:14pt;"class="form-control" placeholder="Write Walkthrough here" required name="walkthrough_file"  /></p>-->
    
    

    
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
</form>
<?php
include ('includes/footer.html');
?>











