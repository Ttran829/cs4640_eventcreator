<?php 
  session_start(); 
  include('signup.php');
?>

<?php
    function checkEmail($entry)
    {
      require('gameconnect-connectdb.php');
      $query = "SELECT * FROM user";
      $statement = $db->prepare($query);
      $statement->execute();
      $results = $statement->fetchAll();
      $statement->closecursor();

      foreach ($results as $result)
      {
          if ($entry == $result['email']){
              return true;
              }
      }
    }

?>
<?php
  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    require('gameconnect-connectdb.php');
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (checkEmail($email) == true)
    {
    echo "<script type='text/javascript'>
    alert('Error: There is already an account with that email address ')
    </script>";
    }

    else
    {
    $query = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();

    $_SESSION['session_name'] = $name;
    $_SESSION['session_email'] = $email;
    $_SESSION['session_password'] = $password;

    echo("<script>location.href = 'login.php';</script>");
    }

  }
?>