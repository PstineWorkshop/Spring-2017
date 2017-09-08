<?php # Script 3.4 - searchResults.php
include ('includes/session.php');

$page_title = 'All GAMES';
include ('./includes/header.php');
$game = $_GET['game_info'];
require_once ('mysqli_connect.php');
 $li ="";

if($game=="null"){
     $li = $li ="no results ";
}else if($game!="null"){
    $query = "SELECT game_name,game_platform FROM game_info WHERE game_name LIKE '%$game%' OR game_platform LIKE '%$game%'";
    
    
    $result = mysqli_query($dbc,$query);
   
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       
     
        $li = $li . "<li><a href=\"gameData.php?game_info=" . $row["game_name"] . "\">" . $row["game_name"]." " .  $row["game_platform"]."</a></li>";//this makes the links that go to each game 




        /*$li = $li . "<li><a href=\"gameInfo.php?game_info=" . $row["game_name"] . "\">" . $row["game_name"]. " Exclusive to the " .$game.  "  console: ". $row["game_exclusive"]. "</a></li>";//here add more data on the game original code */

        }
    }
}

?>
<div class="page-header">
    <h1 id="platformHeader"><?php if($game=="null"){ echo "We couldn't find anything ";} else{echo "All Search Results for ".$game;} ?></h1>

</div>
<div class="well">
    <uL id="gameList">
    	<?php echo $li; ?>


    </uL>
</div>

<?php
include ('./includes/footer.html');
?>
