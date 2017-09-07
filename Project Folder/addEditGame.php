<?php # Script 3.4 - addEditGame.php
include ('includes/session.php');  #support.php

$page_title = 'Add Games';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

if (isset($_POST['submitted'])) {

	 $errors = array();
	//if (empty($_POST['game_platform'])) {
      //      $errors[] = 'You forgot to enter the game platform.';
   // } else {
           // $gp = mysqli_real_escape_string($dbc, trim($_POST['game_platform']));
   // }
     if (empty($_POST['game_name'])) {
            $errors[] = 'You forgot to write the game name.';
    } else {
            $gn = mysqli_real_escape_string($dbc, trim($_POST['game_name']));
    }
     if (empty($_POST['game_exclusive'])) {
            $errors[] = 'You forgot to mention if the game is an exclusive.';
    } else {
            $ge = mysqli_real_escape_string($dbc, trim($_POST['game_exclusive']));
    }
    if (empty($_POST['game_studio'])) {
            $errors[] = 'You forgot to write the studio.';
    } else {
            $gs = mysqli_real_escape_string($dbc, trim($_POST['game_studio']));
    }
    if (empty($_POST['game_description'])) {
            $errors[] = 'You forgot to write the description.';
    } else {
            $gd = mysqli_real_escape_string($dbc, trim($_POST['game_description']));
    }
    if (empty($_POST['game_single_multi'])) {
            $errors[] = 'You forgot to write if the game is single or multi.';
    } else {
            $gsm = mysqli_real_escape_string($dbc, trim($_POST['game_single_multi']));
    }if (empty($_POST['game_genre'])) {
            $errors[] = 'You forgot to write the genre.';
    } else {
            $gg = mysqli_real_escape_string($dbc, trim($_POST['game_genre']));
    }
    if (empty($_POST['game_published'])) {
            $errors[] = 'You forgot to write the published date.';
    } else {
            $gpu = mysqli_real_escape_string($dbc, trim($_POST['game_published']));
    }
    if (empty($_POST['game_esrb'])) {
            $errors[] = 'You forgot to write the published date.';
    } else {
            $ges = mysqli_real_escape_string($dbc, trim($_POST['game_esrb']));
    }


    if (empty($errors)) {//no errors
			

           $p = ($_POST['game_platform']);
            $q = "INSERT INTO game_info (game_platform,game_name,game_exclusive,game_studio,game_description,game_single_multi,game_genre,game_published,game_esrb) VALUES ('$p','$gn','$ge','$gs','$gd','$gsm','$gg','$gpu','$ges')";
			$result = mysqli_query ($dbc, $q);	
	

			if ($result) { // If it ran OK.

                // Print a message:
                echo '<h1>Thank you!</h1>
        <p>The game was successfully added </p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">Your game could not be added due to a system error. We apologize for any inconvenience.</p>'; 

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
mysqli_close($dbc); // Close the database connection.
?>
<div class="page-header">
    <h1>ADD GAMES</h1>
</div>
<form class="form-signin" role="form" action="addEditGame.php" method="post">
    
    
    <!--<p>Game Platform: <input type="normal" class="form-control" placeholder="etc XBOXONE PS4" required autofocus name="game_platform" maxlength="40" value="<?php// if (isset($_POST['game_platform'])) echo $_POST['game_platform']; ?>" /></p>-->

    <p>Game Platform: <select name="game_platform">
    
    foreach ($types as $type) {
        <option value="XBOXONE">XBOXONE</option>
        <option value="PS4">PS4</option>
        <option value="SWITCH">SWITCH</option>
        <option value="PC">PC</option>
    }
    
        </select></p>
    
    <p>Game Name: <input type="normal" class="form-control" placeholder="game name" required name="game_name" maxlength="40" value="<?php if (isset($_POST['game_name'])) echo $_POST['game_name']; ?>" /></p>
    
    <p>Game Exclusive: <input type="normal" class="form-control" placeholder="type yes or no" required name="game_exclusive" maxlength="80" value="<?php if (isset($_POST['game_exclusive'])) echo $_POST['game_exclusive']; ?>"  /> </p>
    
    <p>Game Studio: <input type="normal" class="form-control" placeholder="bioware" required name="game_studio" maxlength="80" value="<?php if (isset($_POST['game_studio'])) echo $_POST['game_studio']; ?>"  /> </p>

    <p>Game Description: <input type="text" style ="height:100px;font-size:14pt;"class="form-control" placeholder="Write a brief description of the game" required name="game_description"  /></p>

    <p>Game Single Multi: <input type="normal" class="form-control" placeholder="single, multi or both" required name="game_single_multi" maxlength="80" value="<?php if (isset($_POST['game_single_multi'])) echo $_POST['game_single_multi']; ?>"  /> </p>

    <p>Game Genre: <input type="normal" class="form-control" placeholder="action" required name="game_genre" maxlength="80" value="<?php if (isset($_POST['game_genre'])) echo $_POST['game_genre']; ?>"  /> </p>


    <p>Game Published: <input type="normal" class="form-control" placeholder="date published" required name="game_published" maxlength="80" value="<?php if (isset($_POST['game_published'])) echo $_POST['game_published']; ?>"  /> </p>

     <p>Game ESRB rating: <input type="normal" class="form-control" placeholder="mature, teen" required name="game_esrb" maxlength="80" value="<?php if (isset($_POST['game_esrb'])) echo $_POST['game_esrb']; ?>"  /> </p>

   


    
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
</form>
<?php
include ('includes/footer.html');
?>











