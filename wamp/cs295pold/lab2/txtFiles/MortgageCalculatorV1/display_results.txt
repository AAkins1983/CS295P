<?php

	// TODO: all of this
	
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

    // if an error message exists, go to the index page
	if ($error_message != '') 
	{
        include('index.php');
        exit(); 
    }
	
    // calculate the payment
	$monthlyRate = ($interest_rate/12)/100;
	$numMonths = $years * 12;
	$payment = ($monthlyRate * $loan_amount)/(1-(pow((1+$monthlyRate),(-1 * $numMonths))));
	
    // apply currency and percent formatting
	$loan_amount_f = '$'.number_format($loan_amount, 2);
	$interest_rate_f = $interest_rate.'%';
	$payment_f = '$'.number_format($payment, 2);

	//PAYMENT CALCULATIONS
	// 200000 loan, 3.85% interest, 30 years = 937.62

	//165000, 4%, 30 years - 787.74
	
	//MORTGAGE PAYMENT FORMULA
	//P = ( r * A ) / ( 1 - (1+r)-N)

	//P = Payment Amount

	//A = Loan Amount

	//r = Monthly Interest Rate

	//N = Number of Monthly Payments 
	
?>


<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Mortgage Calculator</h1>

        <label>Loan Amount:</label>
        <span><?php	echo $loan_amount_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php	echo $interest_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php	echo $years; ?></span><br>

        <label>Payment:</label>
        <span><?php	echo $payment_f; ?></span><br>
    </main>
</body>
</html>
