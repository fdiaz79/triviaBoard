<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <main>
        <div class="jumbotron">
            <h1>Reset your password</h1>
            <p>An e-mail will be sent to you with the instructions to reset your password</p>
            <form action="includes/resetRequest.inc.php" method="POST">
                <input type="text" name="email" placeholder="Enter your email address">
                <button type="submit" name="reset-request-submit">Receive new password by email</button>
            </form>
                
        </div>
    </main>

    
    <?php 
        include('templates/footer.php');
    ?>
</html>