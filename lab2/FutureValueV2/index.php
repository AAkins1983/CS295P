<?php 
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    if (!isset($interest_rate)) { $interest_rate = ''; } 
    if (!isset($years)) { $years = ''; }
    if (!isset($future_value_f)) { $future_value_f = ''; }
	
	if (count($_POST) > 0)
	{
		// get the data from the form
		$investment = filter_input(INPUT_POST, 'investment',
			FILTER_VALIDATE_FLOAT);
		$interest_rate = filter_input(INPUT_POST, 'interest_rate',
			FILTER_VALIDATE_FLOAT);
		$years = filter_input(INPUT_POST, 'years',
			FILTER_VALIDATE_INT);

		// validate investment
		if ($investment === FALSE ) {
			$error_message = 'Investment must be a valid number.'; 
		} else if ( $investment <= 0 ) {
			$error_message = 'Investment must be greater than zero.'; 
		// validate interest rate
		} else if ( $interest_rate === FALSE )  {
			$error_message = 'Interest rate must be a valid number.'; 
		} else if ( $interest_rate <= 0 ) {
			$error_message = 'Interest rate must be greater than zero.'; 
		// validate years
		} else if ( $years === FALSE ) {
			$error_message = 'Years must be a valid whole number.';
		} else if ( $years <= 0 ) {
			$error_message = 'Years must be greater than zero.';
		} else if ( $years > 30 ) {
			$error_message = 'Years must be less than 31.';
		// set error message to empty string if no invalid entries
		} else {
			$error_message = ''; 
		}

		// if everything is ok, do the calculations
		if ($error_message == '') {

			// calculate the future value
			$future_value = $investment;
			for ($i = 1; $i <= $years; $i++) {
				$future_value = 
					$future_value + ($future_value * $interest_rate * .01); 
			}

			// apply currency and percent formatting
			$future_value_f = '$'.number_format($future_value, 2);
		}
	}
	
	// show the form on the page.  It will either display empty strings or the appropriate values
	include("view.php");
?> 
