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

        // Make the query:
        $q = "INSERT INTO Feedback (username, body) VALUES ('$n', '$txt')";
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

<div class="page-header">
    <h2>Let us know what you think... or</h2>
	<h3><a href="contact.php">Contact us directly</a></h3>
</div>
		<!-- comments section -->
		<div class="well">
			<!-- comment form -->
		
			<form class="form-comment" role= "form" action="feedback.php" method="post" id="comment_form">
				<h4>Leave a feedback:</h4>
				<p>Name: <input type="normal" class="form-control" placeholder="Enter name OR remain Anonymous" name="name" maxlength="255" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" /></p>
				<p>Message: <textarea name="text" id="comment_text" class="form-control" placeholder="Your message here..."cols="30" rows="6"></textarea></p>
				<button type="submit" name="submit" class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
				<input type="hidden" name="submitted" value="TRUE" />
			</form>
										
<!--display feedbacks -->
<?php
				
// Make the query:
$q = "SELECT * FROM Feedback ORDER BY created_at DESC";
		
$result = mysqli_query($dbc, $q); // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($result);
$rep = mysqli_num_rows($replies);

if ($num > 0) { // If it ran OK, display the records.
       
    while ($row = mysqli_fetch_assoc($result)) {
		echo '<div id="feedback-wrapper">
				<div class="comment clearfix">
					<div class="comment-details">
						<span class="comment-name">' . $row['username'] . '</span>' . ' ' .
						'<span class="comment-date">' . date("F j, Y ", strtotime($row["created_at"])) . '</span>' .
						'<p>' . $row['body'] . '</p>' .
						'<a class="reply-btn" href="replies.php">reply</a>' .
					'</div>
				</div>
			</div>';
	}

    mysqli_free_result ($result); // Free up the resources.	
}else{
	echo 'Be the first one to leave us a feedback.';
}

mysqli_close($dbc); // Close the database connection.
?>

			

<?php
include ('includes/footer.html');
?>
</div>