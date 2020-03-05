<?php 
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MCSF Trivia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

    <!-- <h1 class="title text-center">MASTER CHORALE OF SOUTH FLORIDA TRIVIA</h1> -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="images/pizza-house.png" alt="some random logo" style="width: 4em;" >
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </a>
            <div class="collapse navbar-collapse" id="navbarContent" >
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active" >
                        <a href="index.php" class="nav-link" >Home</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="#">View Scores</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="#">Add Scores</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="#">Add Questions</a>
                    </li>
                    <!-- <li><a href="#">Create New Trivia</a></li>
                    <li><a href="#">See Trivias</a></li> -->
                </ul>   
                <?php 
                    if (isset($_SESSION['userId'])) {
                        echo '<form class="form-inline my-2 my-lg-0" action="includes/logout.inc.php" method="POST">                    
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout-submit" >Logout</button>
                            </form>';
                    }
                    else {
                        echo '<form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="POST">
                                <input class="form-control mr-sm-2" type="text" name="mailuid" placeholder="Username/email...">
                                <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password...">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login-submit" >Login</button>
                            </form>
                            <a class="nav-link" href="signup.php">Signup </a>';
                    }
                ?>              
                
            </div>
            
        </nav>
    </header>
