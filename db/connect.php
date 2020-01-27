<?php 
    $conn = mysqli_connect('localhost', 'fabian', 'test1234', 'trivia_beethoven');

    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }


?>