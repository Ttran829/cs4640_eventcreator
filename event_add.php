<?php session_start(); 
  if (!isset($_SESSION['session_user_id'])) {
    echo "<script>location.href = 'login.php';</script>";
    }
  include('confirmation.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  require('gameconnect-connectdb.php');
  $eventname = $_POST['eventname'];
  $playernumber = $_POST['playernumber'];
  $gamedate = $_POST['gamedate'];
  $starttime = $_POST['starttime'];
  $endtime = $_POST['endtime'];
  $game = $_POST['game'];
  $session = $_SESSION['session_user_id'];

  $query = "INSERT INTO event (eventname, playernumber, gamedate, starttime, endtime, game, user_id) VALUES (:eventname, :playernumber, :gamedate, :starttime, :endtime, :game, :user_id)";
  $statement = $db->prepare($query);
  $statement->bindValue(':eventname', $eventname);
  $statement->bindValue(':playernumber', $playernumber);
  $statement->bindValue(':gamedate', $gamedate);
  $statement->bindValue(':starttime', $starttime);
  $statement->bindValue(':endtime', $endtime);
  $statement->bindValue(':game', $game);
  $statement->bindValue(':user_id', $session);
  $statement->execute();
  $statement->closeCursor();

  echo("<script>location.href = 'event_dashboard.php';</script>");
}
?>