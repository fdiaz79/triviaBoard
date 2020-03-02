<?php 
    include('db/connect.php');

    //query to get scores from all participants
    // $queryAll = 'SELECT * FROM score_board ORDER BY total_points';
    // $results = mysqli_query($conn, $queryAll);
    // $scores = mysqli_fetch_all($results, MYSQLI_ASSOC);
    // mysqli_free_result($results);

    $participantsQuery = "
        SELECT id, participant FROM participants ORDER BY participant";
    $results = mysqli_query($conn, $participantsQuery);
    if($results === FALSE) {
        die(mysqli_error($conn));
    } else{
        $participants = mysqli_fetch_all($results, MYSQLI_ASSOC);
        mysqli_free_result($results);
        // print_r($participants);
    }

    if(isset($_GET['submit'])) {
        $id = $_GET['participantId'];
        $partScoresQuery = "
            SELECT participants.participant, questions.question, answers.answer, answers.points, answers.bonus 
            FROM answers
            INNER JOIN participants ON participants.id = answers.participant
            INNER JOIN questions ON questions.id = answers.question
            WHERE answers.participant=".$id;
        $results = mysqli_query($conn, $partScoresQuery);
        if($results === FALSE) {
            die(mysqli_error($conn));
        } else{
            $partScores = mysqli_fetch_all($results);
            // print_r($partScores);
            $participantName = $partScores[0][0];
        }
    }

    //     "
    $scoresQuery = "
        SELECT participants.participant, SUM(answers.points + answers.bonus) as points
        FROM participants
        INNER JOIN answers ON participants.id = answers.participant
        GROUP BY participants.participant
        ORDER BY points DESC
    ";
    $results = mysqli_query($conn, $scoresQuery);
    

    if($results === FALSE) {
        die(mysqli_error($conn));
    } else{
        $scores = mysqli_fetch_all($results, MYSQLI_ASSOC);
        // print_r($scores);
    }  
    
    mysqli_free_result($results);
    mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="title">
                    SCOREBOARD
                </h3>
                <?php 
                    echo '<div class="table-head"> Scoreboard to ' . date("jS \of F Y") . '</div>';
                ?>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>
                                Pos.
                            </th>
                            <th>
                                Participant
                            </th>
                            <th>
                                Total Points
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            for ($i = 0; $i < count($scores); $i++){
                                $pos= $i + 1;
                                $participant = $scores[$i]['participant'];
                                $points = $scores[$i]['points'];
                                echo"<tr>";
                                echo "<td> $pos </td> <td> $participant </td> <th> $points points </td> ";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div>

            <div class="col-12 col-md-6">
                <h3 class="title">
                    SEARCH SCORES BY PARTICIPANT
                </h3>
                <?php if(isset($_GET['submit'])) { $participant = $_GET['participantId'];?>
                    <div>
                        <?php 
                            echo '<div class="table-head">Showing scores for: ' . htmlspecialchars($participantName) . '</div>';
                        ?>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        Week
                                    </th>
                                    <th class="text-left">
                                        Question
                                    </th>
                                    <th class="text-left">
                                        Answer
                                    </th>
                                    <th>
                                        Points
                                    </th>
                                    <th>
                                        Bonus
                                    </th>
                                    <th>
                                        Total Week
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($i = 0; $i < count($partScores); $i++){
                                        $week= $i + 1;
                                        $question = $partScores[$i][1];
                                        $answer = $partScores[$i][2];
                                        $points = $partScores[$i][3];
                                        $bonus = $partScores[$i][4];
                                        $total = $points + $bonus;
                                        echo"<tr class='text-center'>";
                                        echo "<td> $week </td> <td class='text-left'> $question </td> <td class='text-left'> $answer </td> <td> $points </td> <td> $bonus </td> <td> $total </td> ";
                                        echo"</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <form action="scoreBoard.php" method="POST">
                            <input type="submit" name="clear" value="New search" class="boton btn btn-warning btn-sm">
                        </form>
                    </div>
                <?php } else { ?>
                    <form action="scoreBoard.php" method="GET">
                        <label for="participantId">Name of the Participant: </label>
                        <select name="participantId" class="custom-select" required>
                            <option value=""> --- Select One --- </option>
                            <?php 
                                for($j = 0; $j < count($participants); $j++) {
                                    $pName = $participants[$j]['participant'];
                                    $pId = $participants[$j]['id'];
                                    echo "<option value='$pId'> $pName </option>";
                                }
                            ?>
                        </select>                        
                        <input type="submit" name="submit" value="Get Scores" class="boton btn btn-warning btn-sm" id="getParticipant">
                    </form>
                <?php } ?>
            </div>

        </div>
        

    </div>

    <?php 
        include('templates/footer.php');
    ?>
</html>