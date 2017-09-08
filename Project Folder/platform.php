<?php # Script 3.4 - platform.php
include ('includes/session.php');

$page_title = 'All GAMES';
include ('./includes/header.php');
$game = $_GET['game_platform'];
require_once ('mysqli_connect.php');


$query = "SELECT * FROM game_info WHERE game_platform='$game'";
	
	
	$result = mysqli_query($dbc,$query);
    $li ="";
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       
     
    	$li = $li . "<li><a href=\"gameData.php?game_info=" . $row["game_name"] . "\">" . $row["game_name"].  "</a></li>";//this makes the links that go to each game 




    	/*$li = $li . "<li><a href=\"gameInfo.php?game_info=" . $row["game_name"] . "\">" . $row["game_name"]. " Exclusive to the " .$game.  "  console: ". $row["game_exclusive"]. "</a></li>";//here add more data on the game original code */

    }
} 

?>
<div class="page-header">
    <h1 id="platformHeader">All <?php echo $game; ?> GAMES</h1>

</div>
<div class="well">
    <uL id="gameList">
    	<?php echo $li; ?>


    </uL>
</div>

<?php
include ('./includes/footer.html');
?>
