<?php # Script 3.4 - #support.php
include ('includes/session.php');  

$page_title = 'Support';
include ('./includes/header.php');
require_once ('mysqli_connect.php');

if (isset($_POST['submitted'])) {

	 $errors = array();
	 if (empty($_POST['report_subject'])) {
            $errors[] = 'You forgot to enter the subject.';
    } else {
            $rs = mysqli_real_escape_string($dbc, trim($_POST['report_subject']));
    }
     if (empty($_POST['report_email'])) {
            $errors[] = 'You forgot to leave us your email.';
    } else {
            $re = mysqli_real_escape_string($dbc, trim($_POST['report_email']));
    }
     if (empty($_POST['report_complaint'])) {
            $errors[] = 'You forgot write your complaint.';
    } else {
            $rc = mysqli_real_escape_string($dbc, trim($_POST['report_complaint']));
    }
    if (empty($_POST['report_user'])) {
            $errors[] = 'You forgot tell us your name or nickname.';
    } else {
            $ru = mysqli_real_escape_string($dbc, trim($_POST['report_user']));
    }

    if (empty($errors)) {//no errors
			$q = "INSERT INTO report (report_subject,report_email,report_complaint,report_user) VALUES ('$rs','$re','$rc','$ru')";
			$result = mysqli_query ($dbc, $q);	
	

			if ($result) { // If it ran OK.

                // Print a message:
                echo '<h1>Thank you!</h1>
        <p>Your complaint was submitted!</p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">Your issue could not be submitted due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.
          mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();


	}else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.


}//big if
mysqli_close($dbc); // Close the database connection.
?>
<div class="page-header">
    <h1>Support</h1>
</div>
<form class="form-signin" role="form" action="support.php" method="post">
    
    
    <p>Name: <input type="normal" class="form-control" placeholder="Your name" required autofocus name="report_user" maxlength="40" value="<?php if (isset($_POST['report_user'])) echo $_POST['report_user']; ?>" /></p>
    
    <p>Subject: <input type="normal" class="form-control" placeholder="The subject of your issue" required name="report_subject" maxlength="40" value="<?php if (isset($_POST['report_subject'])) echo $_POST['report_subject']; ?>" /></p>
    
    <p>Email: <input type="normal" class="form-control" placeholder="Email address" required name="report_email" maxlength="80" value="<?php if (isset($_POST['report_email'])) echo $_POST['report_email']; ?>"  /> </p>
    
    <p>Complaint: <input type="text" style ="height:200px;font-size:14pt;"class="form-control" placeholder="Type your issue here" required name="report_complaint"  /></p>
    
    
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
</form>
<?php
include ('includes/footer.html');
?>











