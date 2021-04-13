<?php session_start();

if (!isset($_SESSION['session_user_id'])) {
  echo "<script>location.href = 'login.php';</script>";
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

  <title>Create Event</title>

  <!-- 3. link bootstrap -->

  <!-- if you choose to use CDN for CSS bootstrap -->

  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/styles.css">
  </head>

  <body onload  = "setFocus()">

    <div class="container">
      <div class = "pt-5">
        <center>
            <img src = "CSS/GameLogo.png" style="width: 24em; height:auto;">
        </center>
       </div>
         
         <div class = "row justify-content-md-center">
             <div class = "col">
                <div class ="card center mt-2">
                  <h3 style= "text-align:center;" class = "m-3"> Welcome <?php if (isset($_SESSION['session_name'])) echo $_SESSION['session_name'] ?>, let's create an event!</h3>
                    <div class = "form m-5">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">   
                          <div id = "name" class="form-group mb-3">
                              <label for="formGroupExampleInput" class="form-label">Event Name</label>
                              <input type="eventname" class="form-control" name ="eventname" id="eventname" placeholder="input event name" onkeyup="verifyEventName()" required>
                              <p id="name_msg" class="feedback"></p>
                            </div>
                            <div id = "number" class=" form-group mb-3">
                              <label for="formGroupExampleInput2" class="form-label"> Number of Players</label>
                              <input type="playernumber" name = "playernumber" class="form-control" id="playernumber" placeholder="input number of players" onkeyup="verifyPlayerNumber()" required>
                              <p id="number_msg" class="feedback"></p>
                            </div>
                            <div class="mb-3">
                              <label for="formGroupExampleInput2" class="form-label"> Game Date</label>
                              <input type="date" class="form-control" id="gamedate" name = "gamedate" placeholder="Another input placeholder">
                            </div>
                            <div class = "row">
                                <div class = "col">
                                  <label for="formGroupExampleInput2" class="form-label"> Start Time</label>
                                  <input type="time" class="form-control" id="starttime" name="starttime"placeholder="Another input placeholder">
                                </div>
                                <div class = "col">
                                  <label for="formGroupExampleInput2" class="form-label"> End Time </label>
                                  <input type="time" class="form-control" id="endtime" name="endtime"placeholder="Another input placeholder">
                                </div>
                            </div>
                            <div class ="float-right mt-5"> 
                              <div class = "row">
                            <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block"  onclick="checkForm()"/>   
                            </div>
                          </div>   
                    <form>
                          <?php

                          // Use post method to send information about game to confirmation page and database
                          if (isset($_POST['eventname']))
                          {
                            $_SESSION['eventname'] = $_POST['eventname'];
                            $_SESSION['playernumber'] = $_POST['playernumber'];
                            $_SESSION['gamedate'] = $_POST['gamedate'];
                            $_SESSION['starttime'] = $_POST['starttime'];
                            $_SESSION['endtime'] = $_POST['endtime'];
                            header('Location: game_select.php');
                          }
                          ?>

                          <div class ="float-right mt-5"> 
                            <div class = "row">
                           <!--- <a href = "event_dashboard.html"> Cancel </a> --->
                           
                          </div>
                        </div>
                    </div>
                    

                </div>
                
             </div>
             
         </div>
       
        

  <script>

    // Sets the first item to be completed into focus
    function setFocus() {
      document.getElementById('eventname').focus();

    }

    // Verify that the event name is filled in
    function verifyEventName() {
      var event_name = document.getElementById('eventname').value;
      var form_name = document.getElementById('name');
      var name_msg = document.getElementById('name_msg');

      if (event_name != "") {
        form_name.classList.add('valid');
        form_name.classList.remove('invalid');
        name_msg.textContent = ""
      }
      else {
        form_name.classList.remove('valid');
        form_name.classList.add('invalid');
        name_msg.textContent = "Please enter a name"
        name_msg.style.color = "#ff0000"
      }

    }
    // Verify that the number inputted is in a valid format
    function verifyPlayerNumber() {
      var player_number = document.getElementById('playernumber').value;
      var form_number = document.getElementById('number');
      var number_msg = document.getElementById('number_msg');
      var numVal = /[0-9]/g;
      if (player_number != "" && player_number.match(numVal)) {
        form_number.classList.add('valid');
        form_number.classList.remove('invalid');
        number_msg.textContent = ""
      }
      else {
        form_number.classList.remove('valid');
        form_number.classList.add('invalid');
        number_msg.textContent = "Please enter a valid number"
        number_msg.style.color = "#ff0000"
      }
    }


  </script>
</body>