<?php 
  include('event_dashboard.php');
  //Author: Tien Tran (tdt4ht) and Kimberly Vo (kv3nw)
?>

<?php
    require('gameconnect-connectdb.php');

    // checking to see if delete as been set from event dashboard
    // if so, the event will be deleted from the database
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $query = "DELETE FROM event WHERE event_id = $id";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        echo("<script>location.href = 'event_dashboard.php';</script>");
    }

    // checks to see if the user has pressed the update button from the modal 
    // if so, the event will have the appropriate fields updated 
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