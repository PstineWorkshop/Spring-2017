<?php # Script 3.4 - index.php
include ('includes/session.php');# reviewWalkthroughList.php

$page_title = 'Welcome to this Site!';
$rw = $_GET['rw'];
$user =$_GET['user_id'];


include ('./includes/header.php');
require_once ('mysqli_connect.php');

echo '<h1>' .  $rw . '</h1>';

if($is_admin){
	if($rw =='Walkthroughs'){
	
		$query = "SELECT g.game_name, u.first_name,w.walkthrough_name FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id";
		$result = mysqli_query($dbc,$query);
		$num = mysqli_num_rows($result);



	}else {
    
		$query1 = "SELECT g.game_name,u.first_name,r.review_name FROM game_info g 
			JOIN review_info rt ON rt.game_id=g.game_id 
			JOIN users u ON u.user_id=rt.user_id 
			JOIN review r ON r.review_id=rt.review_id ";
		$result1 = mysqli_query($dbc,$query1);
		$num = mysqli_num_rows($result1);
		/*SELECT g.game_name, u.first_name,r.review_name FROM review r JOIN review_info t ON r.review_id=t.review_id JOIN game_info g ON g.game_id=r.review_id JOIN users u ON u.user_id=t.user_id;*/
		/*$query = "SELECT g.game_name, u.first_name,w.walkthrough_name FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id WHERE g.game_name='MASS EFFECT ANDROMEDA'";*/


	}

}else{
	if($rw =='Walkthroughs'){
	
		$query = "SELECT g.game_name, u.first_name,w.walkthrough_name FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id WHERE u.user_id=$user";
		$result = mysqli_query($dbc,$query);
		$num = mysqli_num_rows($result);



	}else {
    
		$query1 = "SELECT g.game_name, u.first_name,r.review_name FROM users u
	JOIN review_info rt ON rt.user_id=u.user_id
    JOIN game_info g ON g.game_id=rt.game_id
    JOIN review r ON r.review_id=rt.review_id WHERE u.user_id=$user";
		$result1 = mysqli_query($dbc,$query1);
		$num = mysqli_num_rows($result1);
		/*SELECT g.game_name, u.first_name,r.review_name FROM review r JOIN review_info t ON r.review_id=t.review_id JOIN game_info g ON g.game_id=r.review_id JOIN users u ON u.user_id=t.user_id;*/
		/*$query = "SELECT g.game_name, u.first_name,w.walkthrough_name FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id WHERE g.game_name='MASS EFFECT ANDROMEDA'";*/


	}
}




		
 // Run the query.




if ($num > 0) { // If it ran OK, display the records.

	// Print how many users there are:
	if($rw=='Walkthroughs'){
		echo "<p>There are currently $num Walkthroughs.</p>";
	}else{
		echo "<p>There are currently $num Reviews.</p>";
	}
	

	// Table header.
	echo '<table class="table" align="center" cellspacing="4" cellpadding="3" width="60%">
	<tr>
	<td class="info" align="left"><b>User</b></td>
	<td class="info" aligh="left"><b>Game</b></td>
	<td class="info" align="left"><b>'. $rw .  ' Name</b></td>

	</tr>';
	
	// Fetch and print all the records:
	
	if($rw=='Walkthroughs'){

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		


		echo '<tr><td class="info" align="left">' . $row['first_name'] . '</td><td class="info" align="left">' . $row['game_name'] . '</td><td class="info" align="left">'. $row['walkthrough_name'] . '</td></tr>';
		}
		 echo "<a href=\"addWalkthrough.php?user_id=" . $user . "\" class=\"btn btn-info btn-block\" role=\"button\"> add walkthrough</a>";

	}else{

			while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
		


		echo '<tr><td class="info" align="left">' . $row['first_name'] . '</td><td class="info" align="left">' . $row['game_name'] . '</td><td class="info" align="left">'. $row['review_name'] . '</td></tr>';
		}
		echo "<a href=\"addReview.php?user_id=" . $user . "\" class=\"btn btn-info btn-block\" role=\"button\">  Add A Review</a>";



	}
	

	echo '</table>'; // Close the table.
	
	//mysqli_free_result ($r); // Free up the resources.	

} else { 

	if($rw=='Walkthroughs'){
		echo '<p class="error">There are currently no ' . $rw .' uploaded be the first to do so </p>';
		 echo "<a href=\"addWalkthrough.php?user_id=" . $user . "\" class=\"btn btn-info btn-block\" role=\"button\"> add walkthrough</a>";

	}else{
		echo '<p class="error">There are currently no ' . $rw .' uploaded be the first to do so </p>';
		echo "<a href=\"addReview.php?user_id=" . $user . "\" class=\"btn btn-info btn-block\" role=\"button\">  Add A Review</a>";
	}

	

}

include ('./includes/footer.html');

?>








