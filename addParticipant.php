<?php 
    include('db/connect.php');
    $participant = $media = '';

    // $errors = array('question'=>'', 'answer'=>'', 'points'=>'', 'bonus'=>'');
    
    if(isset($_POST['submit'])){
    
        $participant = mysqli_real_escape_string($conn, $_POST['participant']);
        $media = mysqli_real_escape_string($conn, $_POST['media']);
           

        // echo "$question <br> $answer <br> $points <br> $bonus <br>";

        $insertQuery = "INSERT INTO participants(participant, media) VALUES ('$participant', '$media')";
        if(mysqli_query($conn, $insertQuery)) {
            header('Location: addScores.php');
        } else{
            echo 'There has been an error: ' . mysqli_error($conn);
        }  
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container">
        <form action="addParticipant.php" method="POST">
            <div class="form-group col-sm-8">
                <label for="participant">Type in the name of the participant: </label>
                <input type="text" name="participant" class="form-control" required value="<?php echo htmlspecialchars($participant); ?>">
            </div>
            <div class="form-group col-sm-8">
                <label for="media">What media uses? </label>
                <input type="text" name="media" class="form-control" value="<?php echo htmlspecialchars($media); ?>">
            </div>
            <div class="form-group col-sm-4">
                <label for="submit"> </label>
                <input type="submit" name="submit" value="Add Participant" class="boton btn btn-warning btn-block" id="addQ">
            </div>
        </form>
    </div>

    <?php 
        include('templates/footer.php');
    ?>
</html>