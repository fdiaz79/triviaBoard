<?php 

    if(isset($_POST['submit'])){
        
        $question= $_POST['question'];
        $answer = $_POST['answer'];
        $points = $_POST['points'];
        $bonus = $_POST['bonus'];        

        echo "$question <br> $answer <br> $points <br> $bonus <br>";
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
                <input type="text" name="question" class="form-control">
            </div>
            <div class="form-group">
                <label for="answer">Please type in the answer: </label>
                <input type="text" name="answer" class="form-control">
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="bonus">How many Points? </label>
                    <input type="number" name="points">
                </div>
                <div class="form-group col-md-3">
                    <label for="bonus">Bonus Points? </label>
                    <input type="number" name="bonus" placeholder="0">
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