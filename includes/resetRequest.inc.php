<?php 
    if (isset($_POST['reset-request-submit'])) {

        $selector = bin2hex(random_bytes(8)); //generates bytes and then converts to hexadecimal to generate the token
        $token = random_bytes(32);

        $url = "www.fd-development.com/forgottenpwd/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token); //change accordingly to your webpage
        $expires = date("U") + 1800; //today plus an hour - in seconds


    } else {
        header("Location: ../index.php");
    }