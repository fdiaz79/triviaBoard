<?php 
    include('db/connect.php');
    $question = $answer = $points = $bonus = '';

    // $errors = array('question'=>'', 'answer'=>'', 'points'=>'', 'bonus'=>'');
    
    if(isset($_POST['submit'])){
    
        $question= mysqli_real_escape_string($conn, $_POST['question']);
        $answer = mysqli_real_escape_string($conn, $_POST['answer']);
        $points = $_POST['points'];
        $bonus = $_POST['bonus'];        

        // echo "$question <br> $answer <br> $points <br> $bonus <br>";

        $insertQuery = "INSERT INTO questions(question, answer, points, bonus) VALUES ('$question', '$answer', '$points', '$bonus')";
        if(mysqli_query($conn, $insertQuery)) {
            header('Location: index.php');
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
        <form action="addQuestions.php" method="POST">
            <div class="form-group">
                <label for="question">Please type in your question: </label>
                <input type="text" name="question" class="form-control" required value="<?php echo htmlspecialchars($question); ?>">
            </div>
            <div class="form-group">
                <label for="answer">Please type in the answer: </label>
                <input type="text" name="answer" class="form-control" required value="<?php echo htmlspecialchars($answer); ?>">
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="points">How many Points? </label>
                    <input type="number" name="points" required value="<?php echo htmlspecialchars($points); ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="bonus">Bonus Points? </label>
                    <input type="number" name="bonus" placeholder="0" value="<?php echo htmlspecialchars($bonus); ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="submit"> </label>
                    <input type="submit" name="submit" value="Add Question" class="boton btn btn-warning btn-sm btn-block" id="addQ">
                </div>
            </div>
        </form>
    </div>

    <?php 
        include('templates/footer.php');
    ?>
</html>