<?php 
    $conn = mysqli_connect('localhost', 'fabian', 'test1234', 'trivia_beethoven');

    if (!$conn) {
        die('Connection error: ' . mysqli_connect_error());
    }


?>