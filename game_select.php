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

  <title>Game Selection</title>

  <!-- 3. link bootstrap -->

  <!-- if you choose to use CDN for CSS bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/card_flip.css">

</head>

<body>


  <div class="container">
    <div>
      <h3 style="text-align:center;" class="m-4"> Select a game for <?php echo $_SESSION['eventname'] ?> </h3>
    </div>
    <!--- <div>
              <h5 style="text-align:center;" class = "m-3"> Search for a game </h5>
          </div>

          <div class = "row justify-content-md-center m-2">
              <div class = "col-6">
                <div>
                    <input class="form-control" type="text" placeholder="Enter game name" aria-label="default input example">                    
                </div>               
              </div> 
              <div class = "col-1">
                <button type="button" class="btn btn-primary">Primary</button>   
              </div>                   
          </div>
        </div>
--->



    <div class="container">

      <div class="col-md">
        



    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">  
    <div class = "row" >
     <div class ="col">  
      <input type="text" id= "game" name="game" class="form-control" autofocus required />
      </div>
      <input type="submit" value="Submit" class="btn btn-light" style="background-color:#f35d02; border-color:#f35d02; color:#ffffff" />   
      </div>
    </form>
    <?php
      if (isset($_POST['game']))
      {
        $_SESSION['game'] = $_POST['game'];
        header('Location: confirmation.php');
      }
    ?>




            <script>
              // anonymous function to change the boarder of the text box u=immediately when code is loaded
              var borderFunction = function () {
                var property = document.getElementById('game');
                property.style.borderColor = "#f35d02";
                property.style.color = "#ffffff";
              }
              borderFunction();
            </script>

      
          </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img" src="https://codenames.game/img/ogimage.png" id="cn-img" alt="Avatar"
                    style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>CodeNames</h1>
                    <p>Team building game that depends on good communication</p>
                    <p>Players: 6-8</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Code Names'),changeButtonColor()">Choose</button>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img"
                    src="https://cdn.vox-cdn.com/thumbor/CcTLE6rK-qvWOyhjbOin-dhRcws=/1400x1050/filters:format(png)/cdn.vox-cdn.com/uploads/chorus_asset/file/19623396/Tetris_Logo.png"
                    alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>Tetris</h1>
                    <p>Compete with your firends to see who stacks blocks the best</p>
                    <p>Players: 2-4</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Tetris'),changeButtonColor()">Choose</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img"
                    src="https://gamegfx.spielaffe.de/attachments/portalgame/392/392174/45038_skribbl-spiel1.jpg"
                    alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>Scribl.io</h1>
                    <p>See if you can try to guess your friend's craxy illustrations</p>
                    <p>Players: 2-8</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Scribl.io'),changeButtonColor()">Choose</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


      <div class="row justify-content-md-center">
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img"
                    src="https://image.api.playstation.com/cdn/UP4064/CUSA05724_00/tCIJdrp1aL1apHv3X1zUFiUJ8venl4B2.png"
                    alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>Overcooked</h1>
                    <p>A game the requires teamwork and great communication</p>
                    <p>Players: 3-4</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Overcooked'),changeButtonColor()">Choose</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img"
                    src="https://upload.wikimedia.org/wikipedia/commons/1/19/Cards_Against_Humanity_logo.png"
                    alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>Cards Against Humanity</h1>
                    <p>See whoc an come up with the funniest combination of words</p>
                    <p>Players: 6-8</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Cards Against Humanity'),changeButtonColor()">Choose</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col m-3">
          <div class="game-card" style="width:300px;height:300px;">
            <div class="flip-card">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img class="game-img"
                    src="https://play-lh.googleusercontent.com/yaM3v89XyuV83tErl1YfopkGu8di227yq3aC5tpndZrzCGvUwTt7XrrXFgHiCWr16A"
                    alt="Avatar" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                  <h3>Exploding Kittens</h1>
                    <p>A game of luck and strategy, try not to explode the bomb</p>
                    <p>Players: 4-6</p>
                    <button type="button" class="btn btn-primary"
                      onclick="changeContentById('Exploding Kittens'),changeButtonColor()">Choose</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
  
    
    <script>
      // DOM manipulation to change words within the text field
      function changeContentById(name) {
        document.getElementById('game').value = name;
        var property = document.getElementById('game');
        property.style.color = "#000000";

      }
      // DOM manipulation to change color of button when an object has been chosen
      function changeButtonColor() {
        var property = document.getElementById('main-button');
        property.style.backgroundColor = "#f35d02";
        property.style.borderColor = "#f35d02";
      }


    </script>


</body>