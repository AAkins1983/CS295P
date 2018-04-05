<?php
//set default values
$name = '';
$email = '';
$phone = '';
$message = 'Enter some data and click on the Submit button.';
//EXTRA CREDIT
$phone_error = '';
$name_error = '';
$email_error = '';

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');		// gets data from textbox scrubbed of crap.

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized
		if (!preg_match("/^[A-Z][a-z]*\s[A-Z][a-z]*$/", $name))
			$name_error = "OOPS!";
			
        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        // 2. make sure the email address has at least one @ sign and one dot character
		if (!preg_match("/^\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,8}$/", $email))
			$email_error = "OOPS!";
		
        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890
		// EXTRA CREDIT.
		if (!preg_match("/^(\(\d{3}\)\s*)?\d{3}[\s-]?\d{4}$/", $phone))
			$phone_error = "OOPS!";
		
        /*************************************************
         * Display the validation message
         ************************************************/
		$i = strpos($name, ' ');
		if ($i === false)
		{
			$message = "Hello " . ucfirst($name) . ",\n \n".
			
			"Thank you for entering this data:\n \n".
			
			"Name: ". ucwords($name)."\n".
			"Email: ". $email. "\n".
			"Phone: ". $phone;
		}
		else
		{
			$first_name = substr($name, 0, $i);
			$message = "Hello " . ucfirst($first_name) . ",\n \n".
			
			"Thank you for entering this data:\n \n".
			
			"Name: ". ucwords($name)."\n".
			"Email: ". $email. "\n".
			"Phone: ". $phone;
		}
			
		break;
}
include 'string_tester.php';
?>