<?php #gameData.php
  include ('includes/session.php');
  $page_title = 'Game Info';
  include ('./includes/header.php');
  require_once ('mysqli_connect.php');
  $game = $_GET['game_info'];

$query = "SELECT * FROM game_info WHERE game_name='$game'";
		$result = mysqli_query($dbc,$query); 
		$info = mysqli_fetch_array($result);
		




  

?>


<!--<?php //echo '<img src = "'.$info['game_img'].'" width ="230" height="250" style="padding-right: 15px; align="left">';?>-->
<div class="page-header">
	
    <h1><?php  echo $game?></h1>
</div>
 <div class="btn-group btn-group-justified">  
   <a href="gameData.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">HOME</a>
   <a href="walkthrough.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">WALKTHROUGHS</a>
   <a href="review.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">REVIEWS</a>
   <a href="forum.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">FORUM</a>

</div>
<div class="well">
	
	<?php
		$types = array();
		$num = mysqli_num_rows($result);
		$li="";
		if($num>0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo 
			'<table class ="table" align="center" cellspacing="4" cellpadding="3" width="80%">
 			 	<tr>
   					<td class="info" aligh="left"><b>Exclusive</b></td>
    				<td class="info" aligh="left"><b> Studio</b></td>
    				
    				<td class="info" aligh="left"><b> Single Or Multiplayer</b></td>
    				<td class="info" aligh="left"><b> Genre </b></td>
    				<td class="info" aligh="left"><b>Date Published </b></td>
    				<td class="info" aligh="left"><b>ESRB Rating </b></td>
  				</tr>';
  				echo
  					'<tr>
   					<td class="info" aligh="left">'.$info['game_exclusive'].'</td>
    				<td class="info" aligh="left"> '.$info['game_studio'].'</td>
    				
    				<td class="info" aligh="left"> '.$info['game_single_multi'].'</td>
    				<td class="info" aligh="left"> '.$info['game_genre'].'</td>
    				<td class="info" aligh="left">'.$info['game_published'].' </td>
    				<td class="info" aligh="left">'.$info['game_esrb'].' </td>
  				</tr>';
  		//game_exclusive `game_studio` `game_single_multi``game_genre``game_published``game_esrb`
  				echo '</table>';
  				mysqli_free_result ($result);

		}
		

		
      ?>

</div>


	

<?php

	include ('./includes/footer.html'); 

?>
		


			
  
  



	




	
