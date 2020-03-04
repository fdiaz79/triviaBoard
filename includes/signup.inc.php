<?php 
    if (isset($_POST['signup-submit'])) {
        require('../db/connect.php');

        $userName = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat'];

        if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../signup.php?error=emptyfields&uid=".$userName."&mail=".$email);
            exit(); //stops completely the script
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail&uid=".$userName);
            exit(); //stops completely the script
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            header("Location: ../signup.php?error=invalidusername&mail=".$email);
            exit(); //stops completely the script
        }
        else if ($password !== $passwordRepeat) {
            header("Location: ../signup.php?error=passwordcheck&uid=".$userName."&mail=".$email);
            exit(); //stops completely the script
        }
        else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit(); //stops completely the script
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit(); //stops completely the script
                }
                else {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit(); //stops completely the script
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit(); //stops completely the script
                    }
                }
            }


        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else {
        header("Location: ../signup.php");
        exit(); //stops completely the script
    }