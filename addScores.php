<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container">
        <h3 class="title">Add a new Response.</h3>
        <form action="addScores.php" method="POST">
            <div class="form-group">
                <label for="participant">Participant: </label>
                <select name="participant" class="custom-select">
                    <option value=""> --- Select the participant --- </option>
                    <option value="Participant 1">Participant 1</option>
                    <option value="Participant 2">Participant 2</option>
                    <option value="Participant 3">Participant 3</option>
                    <option value="Participant 4">Participant 4</option>
                    <option value="newParticipant">New Participant</option>
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question: </label>
                <select name="question" class="custom-select">
                    <option value=""> --- Select Question --- </option>
                    <option value="Question 1">Question 1</option>
                    <option value="Question 2">Question 2</option>
                    <option value="Question 3">Question 3</option>
                    <option value="Question 4">Question 4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="answer">Please type in the answer: </label>
                <input type="text" name="answer" class="form-control">
            </div>
            <div class="form-row">
                <div class="form-check col-md-3 ml-4">
                    <input class="form-check-input" type="checkbox" name="correct" value="4">
                    <label class="form-check-label" for="points">Is it correct? </label>
                </div>
                <div class="form-check col-md-3 ml-4">
                    <input class="form-check-input" type="checkbox" name="bonus" value="2">
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