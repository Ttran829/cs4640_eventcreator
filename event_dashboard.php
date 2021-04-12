<?php session_start();

if (!isset($_SESSION['session_user_id'])) {
  echo "<script>location.href = 'login.php';</script>";
  header("Refresh:0");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Author: Kimberly Vo, Tien Tran -->
  <meta name="Kimberly Vo, Tien Tran" content="your name">
  <meta name="description" content="include some description about your page">

  <title>Dashboard</title>

  <!-- 3. link bootstrap -->

  <!-- if you choose to use CDN for CSS bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

  <nav class="navbar sticky-top navbar-light bg-light">
    <div class="container-fluid">
      <img src="CSS/GameLogo.png" style="width: 12em; height:auto;">
      <a class="navbar-brand" href="#">Profile</a>
    </div>
  </nav>
  
  <div class="container">
    <div class="justify-content-center">
      <h3 class="mt-3 mb-3" style="text-align:center;">Game Center Dashboard</h3>
    </div>


    <div>
      <div class="row">
        <div class="col-8">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" style="background-color:#f35d02; border-color:#f35d02">
              Games List
            </a>
            <table id="upcomingGames" class="table">
              <thead>
                <tr>
                  <th> Event Name </th>
                  <th> Number of Players </th>
                  <th> Date </th>
                  <th> Start Time </th>
                  <th> End Time </th>
                  <th> Game </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <?php
                // this portion of the code returns all the events that the user has created and displays them in a table
                // user also has the option to udpdate their event and delete the event
                // updating the event opens a modal with prepopulated data relating to the event
                // deleting the event rewrites the url so that it can be deleted in the process.php file
                require('gameconnect-connectdb.php');
                $session = $_SESSION['session_user_id'];
                $query = "SELECT event_id, eventname, playernumber, gamedate, starttime, endtime, game FROM event WHERE user_id = $session";
                $statement = $db->prepare($query);
                $statement->execute();
                $eventList = [];
                $eventDate =[];
                if ($statement->rowCount() > 0) {
                  // output data of each row
                  while($row = $statement->fetch()) {
              ?>
                <tr>
                  <td><?php echo $row['eventname']; ?></td>
                  <td><?php echo $row['playernumber']; ?></td>
                  <td><?php echo date("m-d-Y", strtotime($row['gamedate'])); ?></td>
                  <td><?php echo date("g:i a", strtotime($row['starttime'])); ?></td>
                  <td><?php echo date("g:i a", strtotime($row['endtime'])); ?></td>
                  <td><?php echo $row["game"]; ?></td>
                  <td><a href="#edit<?php echo $row['event_id']; ?>" data-toggle='modal'><button type='button' class='btn btn-info'>Edit</button></a></td>
                  <td><a href='process.php?delete=<?php echo $row['event_id']; ?>' class='btn btn-danger'>Delete</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="edit<?php echo $row['event_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="process.php" method="POST">
                        <div class="modal-body">
                            
                            <div class="form-group">
                              <input type="hidden" class="form-control" name = "event_id" id = "event_id" value = <?php echo $row['event_id']; ?>>
                            </div>
                            <div class="form-group">
                              <label>Event Name</label>
                              <input type="eventname" class="form-control" name ="eventname" id="eventname" value = <?php echo $row['eventname']?>>
                            </div>
                            <div class="form-group">
                              <label>Event Number of Players</label>
                              <input type="playernumber" class="form-control" name ="playernumber" id="playernumber" value = <?php echo $row['playernumber']?>>
                            </div>
                            <div class="form-group">
                              <label>Event Date</label>
                              <input type="date" class="form-control" name ="gamedate" id="gamedate" value = <?php echo $row['gamedate']?>>
                            </div>
                            <div class="form-group">
                              <label>Event Start Time</label>
                              <input type="time" class="form-control" name ="starttime" id="starttime" value = <?php echo $row['starttime']?>>
                            </div>
                            <div class="form-group">
                              <label>Event End Time</label>
                              <input type="time" class="form-control" name ="endtime" id="endtime" value = <?php echo $row['endtime']?>>
                            </div>
                            <div class="form-group">
                              <label>Event Game Chosen</label>
                              <input type="game" class="form-control" name ="game" id="game" value = <?php echo $row['game']?>>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                      
                    </div>
                  </div>
                </div>
              <?php
                  array_push($eventList,$row["eventname"] );
                  array_push($eventDate,$row["gamedate"] );
                  }
                  
                  //echo "</table>";
                } 
                else { 
                  echo "No Upcoming Events!"; 
                }
                $statement->closeCursor(); 
              ?>
            </table>
          </div>
        </div>
        
        

        <div class="col">
        
            <a href="#" class="list-group-item list-group-item-action active" style="background-color:#f35d02; border-color:#f35d02">
              Notifications
            </a>
            <div> 
            <p class = "m-2" align = "center">
            <div class="alert alert-info" align = "center" role="alert">

             <?php 
            upcoming($eventDate);
            //echo print_r($eventDate);
            ?>
            </p>
            </div>
            
            
          </div>
          <a href="create_event.php">
            <div class="float-right mt-5">
              <button type="button" class="btn btn-primary btn-lg btn-block m-1 " style="background-color:#f35d02; border-color:#f35d02" id="btn-submit">Create New Event</button>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php 
  
  function upcoming($dates){
    $upcomingDates = [];
    $gamesToday = [];
    $return = [];
    $today = date("Y-m-d");
    foreach ($dates as &$value) {
      if ($value == $today){
        array_push($gamesToday,$value);
      }
      else if ($value > $today){
        array_push($upcomingDates,$value);
      }
  }
  
  $gameday = (count($gamesToday) == 1) ? "You have " . sizeof($gamesToday) . " game today!" : "You have " . sizeof($gamesToday) . " games today!";

  echo $gameday . "<br/>";
 
  //echo "You have " . count($gamesToday) ." game(s) today" . "<br/>";
  $numEvents = (count($upcomingDates) == 1) ? "You have " . sizeof($upcomingDates) . " upcoming game!" : "You have " . sizeof($upcomingDates) . " upcoming games!";
  echo $numEvents;

  //echo "You have " . count($upcomingDates) ." upcoming game(s) today";

  }
  
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  
</body>

</html>