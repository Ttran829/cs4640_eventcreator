<?php 
  include('event_dashboard.php');
?>

<?php
    require('gameconnect-connectdb.php');

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM event WHERE event_id = $id";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        echo("<script>location.href = 'event_dashboard.php';</script>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        require('gameconnect-connectdb.php');
        $eventname = $_POST['eventname'];
        $playernumber = $_POST['playernumber'];
        $gamedate = $_POST['gamedate'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $game = $_POST['game'];
        $event_id = $_POST['event_id'];
        
        $query = "UPDATE event SET eventname='$eventname', playernumber='$playernumber', gamedate='$gamedate',
                    starttime='$starttime', endtime='$endtime', game='$game' WHERE event_id = '$event_id'";
        $statement = $db->prepare($query);
        $statement->bindValue(':eventname', $eventname);
        $statement->bindValue(':playernumber', $playernumber);
        $statement->bindValue(':gamedate', $gamedate);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':endtime', $endtime);
        $statement->bindValue(':game', $game);
        $statement->execute();
        $statement->closeCursor();

        echo("<script>location.href = 'event_dashboard.php';</script>");
    }
?>