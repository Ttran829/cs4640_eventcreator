<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/styles.css">
  <title>Event Confirmation</title>    
</head>
<body>
<?php session_start(); ?>
  <!-- form that takes all the event information and prepopulates the confirmation form -->
  <div class="container mt-3">
    
    <div class = "card center" >
      <h3 align = "center" class = "card-header">Event Confirmation</h3>
      <form action="event_add.php" method="POST" class = "m-4">
        <div class="form-group">
          <label>Event Name</label>
          <input type="eventname" class="form-control" name ="eventname" id="eventname" value="<?php echo $_SESSION['eventname'];?>">
        </div>
        <div class="form-group">
          <label>Event Number of Players</label>
          <input type="playernumber" class="form-control" name ="playernumber" id="playernumber" value="<?php echo $_SESSION['playernumber'];?>">
        </div>
        <div class="form-group">
          <label>Event Date</label>
          <input type="date" class="form-control" name ="gamedate" id="gamedate" value="<?php echo $_SESSION['gamedate'];?>">
        </div>
        <div class="form-group">
          <label>Event Start Time</label>
          <input type="time" class="form-control" name ="starttime" id="starttime" value="<?php echo $_SESSION['starttime'];?>">
        </div>
        <div class="form-group">
          <label>Event End Time</label>
          <input type="time" class="form-control" name ="endtime" id="endtime" value="<?php echo $_SESSION['endtime'];?>">
        </div>
        <div class="form-group">
          <label>Event Game Chosen</label>
          <input type="game" class="form-control" name ="game" id="game" value="<?php echo $_SESSION['lunch'];?>">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block"/>
      </form>
    </div>
  </div>
  
</body>
</html>
