<?php
	// new line to break
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$comments = filter_input(INPUT_POST, 'comments');
	// EXTRA CREDIT
	$password = filter_input(INPUT_POST, 'password');
	$phone = filter_input(INPUT_POST, 'phone');
	$pass_error = '';
	$phone_error = '';

    // Validate password: must be 8-10 characters, contain one upper and one lower case letter, and one digit.
	if (!preg_match("$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$", $password))
		$pass_error = "Invalid password";
	
	// Validate phone number: 7-10 characters, must include "-" between sections, might or might not have spaces and/or parentheses.
	if (!preg_match("/^(\(\d{3}\)\s*)?\d{3}[\s-]?\d{4}$/", $phone))
			$phone_error = "Invalid phone number";

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
	$radio = filter_input(INPUT_POST, 'heard_from');
	if ($radio == NULL) 
	{
		$radio = 'unknown';
	}

    // for the wants_updates check box,
	// display a value of 'Yes' or 'No'
	$checkBox = filter_input(INPUT_POST, 'wants_updates');
	if ($checkBox == NULL)
	{
		$checkBox = 'no';
	}
	else 
	{
		$checkBox = 'yes';
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <input type="text" name="name" 
               value="<?php echo htmlspecialchars($password); ?>">
		<span style="color:red"><?php echo $pass_error; ?></span></br>

        <label>Phone Number:</label>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($phone); ?>">
		<span style="color:red"><?php echo $phone_error; ?></span></br>

        <label>Heard From:</label>
        <span><?php echo $radio; ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo $checkBox; ?></span><br>

        <label>Contact Via:</label>
        <span></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo $comments ?></span><br>        
    </main>
</body>
</html>