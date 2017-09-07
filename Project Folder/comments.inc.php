
<?php #comments.inc.php
  
function setComments($dbc){
         if(isset($_POST['commentSubmit'])){
            $uid=$_POST['uid'];
            $date=$_POST['date'];
            $message=$_POST['message'];

            $query ="INSERT INTO comments(uid,c_date,c_MEssage)VALUES('$uid','$date','$message')";
            $result = mysqli_query($dbc,$query); 
         }

}
function getComments($dbc){
      $query = "SELECT * FROM comments";
      $result = mysqli_query($dbc,$query); 
      while($row = mysqli_fetch_assoc($result)){
      	$id = $row['uid'];
      	
      $query1 = "SELECT * FROM users WHERE user_id='$id'";
      $result1 = mysqli_query($dbc,$query1); 

      	if($row2 = mysqli_fetch_assoc($result1)){
      		echo "<div class='comment-box'><p class='commentT'>";
      		echo $row2['first_name']."</br></br>";
      		echo $row['c_date']."</br></br>";
      		echo nl2br($row['c_MEssage']);
      	echo "</div>";
      	}

      	



      	
      }



}



?>