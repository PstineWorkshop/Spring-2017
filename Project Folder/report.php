<?php # Script 3.4 - index.php
include ('includes/session.php');#report.php

$page_title = 'Welcome to this Site!';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

echo '<h1>Full Report List</h1>';

$q = "SELECT report_subject,report_email,report_complaint, report_user,report_id FROM report";		
$r = mysqli_query($dbc, $q); 


// Run the query.

$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.
	
	// Print how many users there are:
	echo "<p>There are currently $num reports.</p>\n";

	// Table header.
	echo '<table class="table" align="left" cellspacing="3" cellpadding="3" width="100%">
	<tr>
	<td class="info" align="left"><b>Subject</b></td>
	<td class="info" align="left"><b>User</b></td> 
	<td class="info" aligh="left"><b>Email</b></td>
	<td class="info" aligh="left"><b>Description</b></td>
	<td class="info" aligh="left"><b>Link To Response</b></td>
	</tr>';
	
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		


	echo '<tr>
				<td class="info" align="left">' . $row['report_subject'] . '</td>
				<td class="info" align="left">' . $row['report_user'] . '</td>
				<td class="info" align="left">'. $row['report_email'] . '</td>
				<td class="info" align="left">'. $row['report_complaint'] .'</td>
				<td class="info" align="left">'."<a href=\"#" .$row["report_id"]."\">"."Link".'</td></tr>';
	}

	echo '</table>'; // Close the table.
	
	mysqli_free_result ($r); // Free up the resources.	

} else { // If no records were returned.

	echo '<p class="error">There are currently no reports.</p>';

}
$query = "SELECT report_subject,report_email,report_complaint, report_user FROM report";		
$result = mysqli_query($dbc, $query); 
$types = array();

// Make the query:
//Run the query.

// Count the number of returned rows:
$num1 = mysqli_num_rows($result);


if ($num1 > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }

    mysqli_free_result ($result); // Free up the resources.	
}




?>

<form class="form-signin" role="form" action="#" method="post">
	

	
	<select>
		<?php 

			if ($num1 > 0){
				foreach ($types as $type) {
        	echo "<option value=\"" . $type['report_id']. "\">" . $type['report_subject'] . "</option>\n";
    		}
			}
		?>
	</select>
	<select>
		
		<option value="In progress">In Progress</option>
		<option value ="Completed">Completed</option>
		<option value="Dismissed">Dismissed</option>
			
		
	</select>
		

	 <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit Status</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
</form>
<?php

include ('./includes/footer.html');

?>








