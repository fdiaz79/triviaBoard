<?php

session_start();
session_unset(); //deletes all the values inside the session variables
session_destroy(); //destroy the sessions running in the website
header('Location: ../index.php');