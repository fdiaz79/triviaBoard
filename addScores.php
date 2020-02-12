<?php 
    include('db/connect.php');
    // get the info to fill out the select fields
    $questionsQuery = 'SELECT id, question, points, bonus FROM questions ORDER BY id';
    $result = mysqli_query($conn, $questionsQuery);
    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    $participantsQuery = 'SELECT id, participant FROM participants ORDER BY participant ';
    $result = mysqli_query($conn, $participantsQuery);
    $participants = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // print_r($participants);
    mysqli_free_result($result);

    // post answers to the DB

    if(isset($_POST['submit'])) {
        $participant = $_POST['participant'];
        $question = $_POST['question'];
        $answer = mysqli_real_escape_string($conn, $_POST['answer']);
        $pointsQuery = 'SELECT points, bonus FROM questions WHERE id = ' . $question;
        $result = mysqli_query($conn, $pointsQuery);
        if($result === FALSE) {
            die(mysqli_error($conn));
        } else{
            $fetchedPoints = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        

        if(!isset($_POST['correct'])){
            $correct = 0;
        } else{
            $correct = (int)$_POST['correct'];
        }
        if(!isset($_POST['bonus'])){
            $bonus = 0;
        } else{
            $bonus = (int)$_POST['bonus'];
        }
        $points = $correct * $fetchedPoints[0]['points'];
        $bonusPoints = $bonus * $fetchedPoints[0]['bonus'];
        

        $answersQuery = "INSERT INTO answers(participant, question, points, bonus, answer) VALUES ('$participant', '$question', '$points', '$bonusPoints', '$answer')";
        if(mysqli_query($conn, $answersQuery)) {
            echo 'Answer succesfully saved';
            unset($_POST);
        } else{
            echo 'There has been an error: ' . mysqli_error($conn);
        }
        
    }



    // mysqli_free_result($result);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container">
        <h3 class="title">Add a new Response.</h3>
        <form action="addScores.php" method="POST">
            <div class="row">
                <div class="form-group col-sm-8">
                    <label for="participant">Participant: </label>
                    <select name="participant" class="custom-select" required>
                        <option value=""> --- Select the participant --- </option>
                        <?php 
                            for ($i = 0; $i < count($participants); $i++) {
                                $pText = $participants[$i]['participant'];
                                $pId = $participants[$i]['id'];
                                echo "<option value='$pId'>$pText </option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4 button-col">
                    <label for="newParticipant">Or: </label>
                    <a href="addParticipant.php" class="boton btn btn-warning btn-block" id="newParticipant">New Participant</a>
                </div>
            </div>
            <div class="form-group">
                <label for="question">Question: </label>
                <select name="question" class="custom-select" required>
                    <option value=""> --- Select Question --- </option>
                    <?php 
                        for($i = 0; $i < count($questions); $i++){
                            $qText = $questions[$i]['question'];
                            $qId = $questions[$i]['id'];
                            echo "<option value='$qId'> $qText</option> ";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="answer">Please type in the answer: </label>
                <input type="text" name="answer" class="form-control" required>
            </div>
            <div class="form-row">
                <div class="form-check col-md-3 ml-4">
                    <input class="form-check-input" type="checkbox" name="correct" value="1">
                    <label class="form-check-label" for="points">Is it correct? </label>
                </div>
                <div class="form-check col-md-3 ml-4">
                    <input class="form-check-input" type="checkbox" name="bonus" value="1">
                    <label class="form-check-label" for="bonus">Bonus Points? </label>
                </div>
            </div>
            <input type="submit" name="submit" value="Add Response" class="boton btn btn-warning btn-lg" id="addQ">
        </form>
    </div>

    <?php 
        include('templates/footer.php');
    ?>
</html>