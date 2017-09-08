<?php # Script 3.4 - walkthrough.php
include ('includes/session.php');
$game = $_GET['game_info'];

$page_title = 'Game Info';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

$li ="";
$query = "SELECT w.walkthrough_name, u.first_name,w.walkthrough_type FROM walkthrough w JOIN walkthrough_info t ON t.walkthrough_id=w.walkthrough_id JOIN game_info g ON g.game_id=t.game_id JOIN users u ON u.user_id=t.user_id WHERE g.game_name='$game'";
$result = mysqli_query($dbc,$query); 
$num =mysqli_num_rows($result);
$info = mysqli_fetch_array($result);


if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
       
     //game_exclusive``game_studio``game_description``game_single_multi``game_genre``game_published`SELECT * FROM `game_info
    	$li = $li . "<li><a href=\"viewWalkthrough.php?game_info=" . $row["walkthrough_name"] . "\">" . $row["first_name"]. " " . $row["walkthrough_name"]. " ". $row["walkthrough_type"] . "</a></li>";//this makes the links that go to each game 
    	

    }
}
?>
<div class="page-header">
    <h1><?php  echo $game . "<br>". "list of walkthroughs"?></h1>
</div>
<div class="btn-group btn-group-justified">  
    <a href="gameData.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">HOME</a>
   <a href="walkthrough.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">WALKTHROUGHS</a>
   <a href="review.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">REVIEWS</a>
   <a href="forum.php?game_info=<?php echo $game?>" class="btn btn-info" role="button">FORUM</a>

    <?php  
        
        if(isset($_SESSION['user_id'])){
            
            $ui = $_SESSION['user_id'];
            $ll="";
            $id = "SELECT user_id FROM users WHERE user_id=$ui";
            $result=mysqli_query($dbc,$id);
             $count = 0;

            if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)){
                    
                         $ll = $ll ." ". $row['user_id'];
                         

                
                 }
            }  
            $user = (int)$ll;
           
                
                
          //echo "<a href=\"addWalkthrough.php?user_id=" .$user.  "\">"." add you own walkthrough". "</a>" ; 
          echo "<a href=\"addWalkthrough.php?user_id=" . $user . "\" class=\"btn btn-info\" role=\"button\"> add walkthrough</a>";
          

         // $li = $li . "<li><a href=\"viewWalkthrough.php?game_info=" . $row["walkthrough_name"] . "\">" . $row["first_name"]. " " . $row["walkthrough_name"]. " ". $row["walkthrough_type"] . "</a></li>";//this makes the links that go to each game . class="btn btn-info" . role="button"
          
             
        }

     ?>
</div>
<div class="well">
    
     <?php
        if($num>0){
            echo '<table class ="table" align="center" cellspacing="4" cellpadding="3" width="80%">
                <tr>
                    <td class="info" aligh="left"><b>User Name</b></td>
                    <td class="info" aligh="left"><b>Walkthrough Name</b></td>
                    
                    <td class="info" aligh="left"><b>Walkthrough Type</b></td>
                    <td class="info" aligh="left"><b>Link To Walthrough</b></td>

                    
                </tr>';
            
                    
                echo '<tr>
                    <td class="info" aligh="left">'.$info['first_name'].'</td>
                    <td class="info" aligh="left">'.$info['walkthrough_name'].'</td>
                    
                    <td class="info" aligh="left">'.$info['walkthrough_type'].'</td>
                    <td class="info" aligh="left">'."<a href=\"viewWalkthrough.php?game_info=" . $info['walkthrough_name'] . "\" class=\"btn btn-info\" role=\"button\">  Go to walkthrough</a>".'</td>
                    
                </tr>';
                         

                
                 


                echo'</table>';
        }
            
    ?>




    <ul>
    	
    	<?php echo $li ?>

    </ul>
</div>
<?php
include ('./includes/footer.html');
?>


