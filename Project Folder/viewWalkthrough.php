<?php # Script 3.4 - viewWalkthrough.php
include ('includes/session.php');
$game = $_GET['game_info'];
$page_title = 'Walkthrough';
include ('./includes/header.php');
include ('comments.inc.php');
require_once ('mysqli_connect.php');
$query = "SELECT w.walkthrough_file FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id WHERE w.walkthrough_name='$game'";
$result = mysqli_query($dbc,$query); 

?>
<div class="page-header">
    <h1><?php echo $game?></h1>

</div>
<div class="well">
    <?php 

    	$li="";
    	if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
       
     //game_exclusive``game_studio``game_description``game_single_multi``game_genre``game_published`SELECT * FROM `game_info
    	$li = $li . $row["walkthrough_file"];//this makes the links that go to each game 
    	echo $li;

    }
}

?>
</div>
<?php 
    if(isset($_SESSION['user_id'])){
         echo "<form method='POST' action='".setComments($dbc)."'>
         <input type='hidden' name='uid' value='".$_SESSION['user_id']."'>
         <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
         <textarea class='texB'name='message'></textarea></br>
         <button class='btn btn-info' name='commentSubmit' type ='submit'>Comment</button>
     </form>";
 }else{
    echo 'Create an account or log in to add your own comments';
 }
    
     getComments($dbc);
?>
<?php
include ('./includes/footer.html');
?>