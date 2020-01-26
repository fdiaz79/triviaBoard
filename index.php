<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container">
        <div class="row" id="button-row">
            <div class="col-4 button-col">
                <a href="addQuestions.php" class="boton btn btn-warning btn-lg btn-block">Add Question</a>
            </div>
            <div class="col-4 button-col">
                <a href="addScores.php" class="boton btn btn-warning btn-lg btn-block">Add Scores</a>
            </div>
            <div class="col-4 button-col">
                <a href="scoreBoard.php" class="boton btn btn-warning btn-lg btn-block">See scoreboard</a>
            </div>
        </div>

    </div>
    
    <?php 
        include('templates/footer.php');
    ?>
</html>