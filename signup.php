<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <main>
        <div class="card">
            <div class="card-header text-center">
                <h1>Signup</h1>
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyfields'){
                            echo '<p class="signupError">Fill in all fields</p>';
                        }
                        else if ($_GET['error'] == 'invalidmail') {
                            echo '<p class="signupError">Invalid e-mail</p>';
                        }
                        else if ($_GET['error'] == 'invalidusername') {
                            echo '<p class="signupError">Invalid User Name</p>';
                        }
                        else if ($_GET['error'] == 'passwordcheck') {
                            echo '<p class="signupError">Password must match</p>';
                        }
                        else if ($_GET['error'] == 'sqlerror') {
                            echo '<p class="signupError">Error connecting to the DB</p>';
                        }
                        else if ($_GET['error'] == 'usertaken') {
                            echo '<p class="signupError">User already exists</p>';
                        }
                    }
                    else if ($_GET['signup'] == 'success') {
                        echo '<p class="signupSuccess">Signup successful</p>';
                    }
                ?>
            </div>
            <div class="card-body">
                <form action="includes/signup.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="mail" placeholder="Email">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <button type="submit" name="signup-submit" >Signup </button>
                </form>
                <a href="resetPassword.php">Forgot your password?</a>
            </div>
        </div>
    </main>

    
    <?php 
        include('templates/footer.php');
    ?>
</html>