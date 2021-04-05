<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
  <title>Event Confirmation</title>    
</head>
<body>
<?php session_start(); ?>
     
  <div class="container">
    <div class = "card">
    <h3 align = "center">Event Confirmation</h3>
    </h3>
       
    <div class= "m-3">
    Event Name <font color="green" style="font-style:italic"><?php echo $_SESSION['eventname'] ?></font>
    <br/>
    
    Event Date <font color="green" style="font-style:italic"><?php echo $_SESSION['gamedate'] ?></font>
    
    <br/>
    Event Start Time <font color="green" style="font-style:italic"><?php echo $_SESSION['starttime'] ?></font>
    <br/>
    Event End Time <font color="green" style="font-style:italic"><?php echo $_SESSION['endtime'] ?></font>
    <br/>
    Game Chosen <font color="green" style="font-style:italic"><?php echo $_SESSION['lunch'] ?></font>

    <br/>
    
    <div>
  </div>
  <button type="button" class="btn btn-primary" id="btn-submit">Confirm</button>
  <div>
  
</body>
</html>
