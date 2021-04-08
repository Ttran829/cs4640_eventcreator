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
      <a class="navbar-brand" href="#">Navigation</a>
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
            <a href="#" class="list-group-item list-group-item-action active">
              Upcoming Games
            </a>

          </div>
        </div>
        <div class="col">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
              Invitations
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
          </div>
          <a href="create_event.php">
            <div class="float-right mt-5">
              <button type="button" class="btn btn-primary m-1 " id="btn-submit">Create New Event</button>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>