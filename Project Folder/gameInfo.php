<?php # Script 3.4 - gameInfo.php
include ('includes/session.php');
$game = $_GET['game_info'];

$page_title = 'Game Info';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

$li ="";
$query = "SELECT * FROM game_info WHERE game_name='$game'";
$result = mysqli_query($dbc,$query); 
$num = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
       
     //game_exclusive``game_studio``game_description``game_single_multi``game_genre``game_published`SELECT * FROM `game_info
      $li = $li . "<li>" ."is console exclusive ". $row["game_exclusive"]. " ". $row["game_studio"]. " ". $row["game_description"]. " ". $row["game_single_multi"]. " ". $row["game_genre"]." ". $row["game_published"]." ".$row["game_esrb"] ."</li>";//this makes the links that go to each game 
      

    }
}
?>
<div class="page-header">
    <h1><?php  echo $game?></h1>
   <a href="gameInfo.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">HOME</a>
   <a href="walkthrough.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">WALKTHROUGHS</a>
   <a href="review.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">REVIEWS</a>
   <a href="forum.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">FORUM</a>
   


</div>
<div class="well">
    
      <?php
         
         
  // Table header.
  /*echo '<table class ="game" align="center" cellspacing="3" cellpadding="3" width="80%">
  <tr>
   
    
    <td class="td" aligh="left"><b>Exclusive</b></td>
    <td class="td" aligh="left"><b> Studio</b></td>
    <td class="td" aligh="left"><b> Description</b></td>
    <td class="td" aligh="left"><b> Single Player Or Multiplayer</b></td>
    <td class="td" aligh="left"><b> Genre </b></td>
    <td class="td" aligh="left"><b>Date Published </b></td>
    <td class="td" aligh="left"><b>ESRB Rating </b></td>
  </tr>';
  echo '</table>';
  // Fetch and print all the records:
  /*if ($num > 0){
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    


  echo '<tr>
            
            <td align="left">' . $row['game_exclusive'] . '</td>
            <td align="left">'. $row['game_studio'] . '</td>
            <td align="left">' . $row['game_description'] . '</td>
            <td align="left">' . $row['game_single_multi'] . '</td>
            <td align="left">'. $row['game_genre'] . '</td>
            <td align="left">' . $row['game_published'] . '</td>
            <td align="left">' . $row['game_esrb'] . '</td>
           
      </tr>';
       }else{
    echo 'no data';
  }

  }*/

  

 // mysqli_free_result ($result);
 
  

?>
      

      <?php //echo $li ?>

    
</div>
<?php?
include ('./includes/footer.html');
?>