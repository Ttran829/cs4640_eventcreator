
<?php
//Author: Tien Tran (tdt4ht) and Kimberly Vo (kv3nw)
    session_start();
    include('login.php');
?>


<?php
    function validate($emailAttempt, $passwordAttempt)
    {
        require('gameconnect-connectdb.php');
        $query = "SELECT * FROM user";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closecursor();

        foreach ($results as $result)
        {
            if ($emailAttempt == $result['email'] && $passwordAttempt == $result['password']){
                $_SESSION['session_user_id'] = $result['user_id']; 
                $_SESSION['session_name'] = $result['name'];
                return true;
                }
        }
    }

?>
  <?php
  global $number_attempt;
  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    require('gameconnect-connectdb.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (validate($email, $password) == false)
    {
    $number_attempt = intval($_POST['attempt']) + 1; 
    header("Location: " .$_SERVER['PHP_SELF'] . "?attempt=$number_attempt&msg=Username and password do not match our record");
    echo "<script type='text/javascript'>
    alert('Error: That is not a valid username and password ')
    </script>";
    }

    else
    {
    //$_SESSION['session_name'] = $name;
    $_SESSION['session_email'] = $email;
    $_SESSION['session_password'] = $password;

    echo("<script>location.href = 'event_dashboard.php';</script>");
    }

  }
?>