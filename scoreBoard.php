<!DOCTYPE html>
<html lang="en">
    <?php 
        include('templates/header.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="title text-center">
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
                            for ($i = 0; $i < 4; $i++){
                                $pos= $i + 1;
                                $points = 10 - $pos;
                                echo"<tr>";
                                echo "<th> $pos </th> <th> Participant $pos </th> <th> $points points </th> ";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>

            </div>

            <div class="col-12 col-md-6">
                <h3 class="title text-center">
                    SEARCH SCORES BY PARTICIPANT
                </h3>
                <?php if(isset($_GET['submit'])) { $participant = $_GET['participant'];?>
                    <div>
                        <?php 
                            echo '<div class="table-head">Showing scores for: ' . htmlspecialchars($participant) . '</div>';
                        ?>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th>
                                        Week
                                    </th>
                                    <th>
                                        Question
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
                                    for ($i = 0; $i < 5; $i++){
                                        $week= $i + 1;
                                        $points = 4;
                                        $bonus = 2;
                                        $total = $points + $bonus;
                                        echo"<tr>";
                                        echo "<th> $week </th> <th> Question $week </th> <th> $points </th> <th> $bonus </th> <th> $total </th> ";
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
                        <label for="question">Name of the Participant: </label>
                        <input type="text" name="participant">
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