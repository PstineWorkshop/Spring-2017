<?php 


require_once ('mysqli_connect.php');

	$game = $_GET['game_platform'];

	$ggms ='HELLO';

	$query = "SELECT * FROM game_info WHERE game_platform='$game'";
	
	
	$result = mysqli_query($dbc,$query);
    
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	echo "id: " . $row["game_id"]. " - Name: " . $row["game_name"]. " " . $row["game_platform"]." ".  $row["game_exclusive"]. "<br>";
    }
} else {
    echo "0 results";
}



	//echo json_encode($result);
 ?>

 