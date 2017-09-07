<?php # Script 3.4 - eachReport.php
include ('includes/session.php');

$page_title = 'Individual Reports';
include ('./includes/header.php');
require_once ('mysqli_connect.php');
$user = $_GET['game_info'];
echo $user;
$query = "SELECT report_complaint,report_user FROM report WHERE report_id='$user'";
$result = mysqli_query($dbc,$query); 
$li="";
	



?>
<div class="page-header">
    <h1><?php echo  "This report was made by: " . $user ?></h1>

</div>
<div class="well">
    
    	
    	<?php  
    		if (mysqli_num_rows($result) > 0){

			$li = $li . "<p>". $row['report_complaint']."</p>";
	 
			}
			echo $li;

    		?>
    		
    	

    
    
</div>
<?php
include ('./includes/footer.html');
?>