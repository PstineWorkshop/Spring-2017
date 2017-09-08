<?php # Script 3.4 - index.php
include ('includes/session.php');# viewGames.php

$page_title = 'Welcome to this Site!';



include ('./includes/header.php');
require_once ('mysqli_connect.php');

echo '<h1> All Games </h1>';

echo '<a href="addEditGame.php" class="btn btn-info btn-block"  role="button">Click Here To Add Games</a>';


		$query ="SELECT g.game_name,g.game_platform FROM game_info g";
		$result = mysqli_query ($dbc, $query);
 // Run the query.

		$num = mysqli_num_rows($result);


if ($num > 0) { // If it ran OK, display the records.

	echo "<p>There are currently $num games in the database.</p>";  


	// Table header.
	echo '<table class="table "align="center" cellspacing="3" cellpadding="3" width="40%">
	<tr>
		<td class="info" align="left"><b>Game Name</b></td>
		<td class="info" align="left"><b>Game Platform</b></td> 
	</tr>';
	
	// Fetch and print all the records:
	
	

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		


		echo '<tr><td class="info" align="left">' . $row['game_name'] . '</td><td class="info" align="left">' . $row['game_platform'] . '</td></tr>';
		}

	
	

	echo '</table>'; // Close the table.
	
	//mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no games on the database  </p>';

}

include ('./includes/footer.html');

?>








