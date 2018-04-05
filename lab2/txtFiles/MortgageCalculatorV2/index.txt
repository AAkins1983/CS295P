<?php
	// TODO:
    // set default value of variables for initial page load
	// loan aount, interest rate, years AND the error message
	if (!isset($loan_amount_f)) { $loan_amount_f = '';}
	if (!isset($interest_rate_f)) { $interest_rate_f = '';}
	if (!isset($years)) { $years = '';}
	if (!isset($payment_f)) { $payment_f = '';}
	if (!isset($error_message)) { $error_message = '';}
	
	if (count($_POST) > 0)
	{
		// get the data from the form.  Use the filter input function to do preliminary validation
		$loan_amount = filter_input(INPUT_POST, 'loan_amount',
			FILTER_VALIDATE_FLOAT);
		$interest_rate = filter_input(INPUT_POST, 'interest_rate',	
			FILTER_VALIDATE_FLOAT);
		$years = filter_input(INPUT_POST, 'years',
			FILTER_VALIDATE_INT);
	
		
		// validate loan amount < 0 and > 1,000,000
		if ($loan_amount === FALSE ) 
		{
			$error_message = 'Loan amount must be a valid number.'; 
		} 
		else if ( $loan_amount < 0 || $loan_amount > 1000000 ) 
		{
			$error_message = 'Loan amount must be greater than zero and less than 1,000,000.'; 
		} 
		
		// validate interest rate < 0 and > 15
		else if ( $interest_rate === FALSE )  
		{
			$error_message = 'Interest rate must be a valid number.'; 
		} 
		else if ( $interest_rate < 0 || $interest_rate > 15 ) 
		{
			$error_message = 'Interest rate must be greater than zero and less than 15.'; 
		} 

		// validate years between 15 and 30 OR EVEN BETTER 15, 20 or 30
		else if ( $years === FALSE ) 
		{
			$error_message = 'Years must be a valid whole number.';
		} 
		else if ( $years < 15 || $years > 30) 
		{
			$error_message = 'Years must be greater than 15 and less than 30.';
		} 
	
		// set error message to empty string if no invalid entries
		else 
		{
			$error_message = ''; 
		}
		
		if ($error_message == '')
		{
	
			// calculate the payment
			$monthlyRate = ($interest_rate/12)/100;
			$numMonths = $years * 12;
			$payment = ($monthlyRate * $loan_amount)/(1-(pow((1+$monthlyRate),(-1 * $numMonths))));
			
			// apply currency and percent formatting
			$loan_amount_f = '$'.number_format($loan_amount, 2);
			$interest_rate_f = $interest_rate.'%';
			$payment_f = '$'.number_format($payment, 2);
		}
	}
	
	include("display_results.php");

?> 
