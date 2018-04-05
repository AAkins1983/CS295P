<?php
	// TODO:
    // set default value of variables for initial page load
	// loan aount, interest rate, years AND the error message
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
	<p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <form action="display_results.php" method="post">
        <div id="data">
            <label>Loan Amount:</label>
            <input type="text" name="loan_amount"
                   value="<?php // TODO: redisplay the loan amount ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php // TODO: ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php	// TODO: ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Payment"><br>
        </div>

    </form>
    </main>
</body>
</html>