<!DOCTYPE html>
<html>
<head>
    <title>Mortgage Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Mortgage Calculator</h1>
	<p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <form action="index.php" method="post">
        <div id="data">
            <label>Loan Amount:</label>
            <input type="text" name="loan_amount"
                   value="<?php echo htmlspecialchars($loan_amount); ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo htmlspecialchars($interest_rate); ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo htmlspecialchars($years); ?>">
            <br>
			
			<!-- Add a checkbox that determines if the user wants
						to display the amortization schedule.  Make sure that
						the attribute check is added (in php code) if the user 
						previously checked the check box and the form is redisplayed -->
						<label>Display Schedule:</label>		
			<input type="checkbox" name="display_schedule"
			<?php if ($display_schedule) {echo 'checked';} ?> >
			<br>
			
			<label>Payment:</label>
			<span><?php echo $payment_f; ?></span>
			<br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Payment"><br>
        </div>

    </form>
    </main>
	<schedule>
	<?php
		// If you're supposed to display the schedule, call your function to do that
		if ($display_schedule)
			printSchedule($schedule);
	?>
	</schedule>
</body>
</html>