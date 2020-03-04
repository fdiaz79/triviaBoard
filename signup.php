<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <main>
        <div class="card">
            <div class="card-header text-center">
                <h1>Signup</h1>
            </div>
            <div class="card-body">
                <form action="includes/signup.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="mail" placeholder="Email">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <button type="submit" name="signup-submit" >Signup </button>
                </form>
            </div>
        </div>
    </main>

    
    <?php 
        include('templates/footer.php');
    ?>
</html>