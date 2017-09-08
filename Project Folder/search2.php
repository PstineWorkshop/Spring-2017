<?php #search2.php

	
require_once ('mysqli_connect.php');

$game =$_GET['search'];

	$query = "SELECT game_name, game_platform FROM game_info WHERE game_name LIKE '%$game%' OR game_platform LIKE'%$game%'";
	
	
	$result = mysqli_query($dbc,$query);
	    $li ="";
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       
     
    	$li = $li .  $row["game_name"] . " ". $row["game_platform"];//this makes the links that go to each game 




    	/*$li = $li . "<li><a href=\"gameInfo.php?game_info=" . $row["game_name"] . "\">" . $row["game_name"]. " Exclusive to the " .$game.  "  console: ". $row["game_exclusive"]. "</a></li>";//here add more data on the game original code */

    }
} 


//echo $game;




echo json_encode($li);
?>