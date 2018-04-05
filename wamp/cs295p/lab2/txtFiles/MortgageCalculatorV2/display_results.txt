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
                   value="<?php echo $loan_amount_f ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo $interest_rate_f ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php	echo $years; ?>">
            <br>
			
			<label>Payment:</label>
			<span><?php	echo $payment_f; ?></span><br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate Payment"><br>
        </div>

    </form>
    </main>
</body>
</html>