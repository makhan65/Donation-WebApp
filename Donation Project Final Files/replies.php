<?php
include ('includes/session.php');
$page_title = 'Feedback';

include ('includes/header.php');

include ('mysqli_connect.php'); 

if (isset($_POST['submitted'])) {	
	$errors = array();
	// Check for name:
    if (empty($_POST['name'])) {
            $n = 'Anonymous';
    } else {
            $n = mysqli_real_escape_string($dbc, trim($_POST['name']));
    }
	// Check for empty message:
	if (empty($_POST['text'])) {
            $errors[] = 'You forgot to leave a message.';
    } else {
            $txt = $_POST['text'];
    }

if (empty($errors)) { // If everything's OK.
        // Register data in the database...
		$f = "SELECT id FROM Feedback";

        // Make the query:
        $q = "INSERT INTO Reply (username, body) VALUES ('$n', '$txt')";
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

                // Print a message:
                echo '<h3>Thank you!</h3>
        <p>For your feedback!</p><p><br /></p>' .
		'<a href="feedback.php"><-- Go back</a>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h3>System Error</h3>
                <p class="error">Oops something went wrong...</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br /> ';
			foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
}	

?>
<h1>Ooops... this page is currently under construction </h1> 
<!-- <div class="page-header">
    <h2>Let us know what you think...</h2>
</div>-->
		<!-- comments section -->
		<div class="well">
			<!-- comment form -->
	<!--	
			<form class="form-reply" role= "form" action="replies.php" method="post" id="replies_form">
				<h4>Leave a feedback:</h4>
				<p>Name: <input type="normal" class="form-control" placeholder="Enter name OR remain Anonymous" name="name" maxlength="255" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></p>
				<p>Message: <textarea name="text" id="reply_text" class="form-control" placeholder="Your message here..."cols="30" rows="2"></textarea></p>
				<button type="submit" name="submit" class="btn btn-primary btn-sm pull-right" id="submit_reply">Submit comment</button>
				<input type="hidden" name="submitted" value="TRUE" />
			</form>
-->		
<?php
include ('includes/footer.html');
?>