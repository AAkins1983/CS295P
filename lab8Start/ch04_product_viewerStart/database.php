<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();	// asking exception object "what's your message."
        include('database_error.php');		// if something goes wrong, takes to another page.
        exit();
    }
?>