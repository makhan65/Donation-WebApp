<?php
include ('includes/session.php');
$page_title = 'Contact Us';

include ('includes/header.php');

include ('mysqli_connect.php'); 

if (isset($_POST['submitted'])) {

    $errors = array(); // Initialize an error array.
	$message = 'Customer has requested to contact you directly. Respond ASAP!';
    // Check for a first name:
    if (empty($_POST['first_name'])) {
            $errors[] = 'You forgot to enter your first name.';
    } else {
            $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    }

    // Check for a last name:
    if (empty($_POST['last_name'])) {
            $errors[] = 'You forgot to enter your last name.';
    } else {
            $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    }

    // Check for an email address:
    if (empty($_POST['email'])) {
            $errors[] = 'You forgot to enter your email address.';
    } else {
            $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    // Check for a password and match against the confirmed password:
    if (empty($_POST['phone'])) {
            $errors[] = 'You forgot to enter your phone number';
    } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['phone']));
    }

    if (empty($errors)) { // If everything's OK.
        
        // Register the user in the database...

        // Make the query:
        $q = "INSERT INTO Contacts (firstName, lastName, email, phoneNo) VALUES ('$fn', '$ln', '$e', '$p' )";
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.
			
			mail("jjacildo@neiu.edu", "Request to contact",
			$message, "From: $e");
			
                // Print a message:
                echo '<h3>Thank you!</h3>
        <p>We will contact you as soon as possible.</p><p><br /></p>';	

        } else { // If it did not run OK.

                // Public message:
                echo '<h3>System Error</h3>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        include ('includes/footer.html'); 
        exit();

    } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br />';
            foreach ($errors as $msg) { // Print each error.
                    echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';

    } // End of if (empty($errors)) IF.
	
} 
?>

<div class="page-header">
    <h2>Contact Us</h2>
</div>
<div class="well">
	<form class="form-contact" role="form" action="contact.php" method="post">
    
    <p>First Name: <input type="normal" class="form-control" placeholder="Your first name" required autofocus name="first_name" maxlength="40" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
    <p>Last Name: <input type="normal" class="form-control" placeholder="Your last name" required name="last_name" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    <p>Email Address: <input type="normal" class="form-control" placeholder="Email address" required name="email" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Phone #: <input type="normal" class="form-control" placeholder="(###)###-####" required name="phone" maxlength="10" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"  /> </p>
    <p><button type="submit" name="submit" class="btn btn-sm btn-primary" />Submit</button></p>
    <input type="hidden" name="submitted" value="TRUE" />
    
    
	</form>

<?php
include ('includes/footer.html');
?>
</div>