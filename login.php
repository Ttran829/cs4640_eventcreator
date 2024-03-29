<!-- 1. create HTML5 doctype -->
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">  
    
    <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 
    Bootstrap is designed to be responsive to mobile.
    Mobile-first styles are part of the core framework.
    
    width=device-width sets the width of the page to follow the screen-width
    initial-scale=1 sets the initial zoom level when the page is first loaded   
    -->
      <!-- Author: Kimberly Vo, Tien Tran -->
    
    <meta name="Kimberly Vo, Tien Tran" content="your name">
    <meta name="description" content="include some description about your page">  
        
    <title>Login</title>
    
    <!-- 3. link bootstrap -->

    <!-- if you choose to use CDN for CSS bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    
    <!-- 
    Use a link tag to link an external resource.
    A rel (relationship) specifies relationship between the current document and the linked resource. 
    -->
    
    <!-- if you choose to download bootstrap and host it locally -->
    <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> --> 
    
    <!-- include your CSS -->
    <link rel="stylesheet" href="CSS/styles.css">
        
    </head>

    <body onload="setFocus()">
  
        <div class="container">
            <div class = "row justify-content-md-center">                    
               <div class = "col-md-8">
                   <div class = "pt-5 pb-3">
                    <center>
                        <img src = "CSS/GameLogo.png" style="width: 24em; height:auto;">
                    </center>
                   </div>
                    <!----<h2 style="text-align:center;" class = "m-4"> GameConnect </h2> -->
                    <div class="card center">
                        <h4 style = "text-align: center;" class = "m-3"> Login </h4>
                        <form class = "form m-5" action = "login_verify.php" method = "POST">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" id="email" class="form-control" required />
                    <!---Use hidden inputs to count the number of attempts of logging in --->
                                <input type="hidden" name="attempt" value="<?php if (isset($_GET['attempt'])) echo $_GET['attempt'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block" value="Sign In">
                                <?php
                                    $number_attempt = null;
                                    // Counts the number of attempts for the hiddin field using get method
                                    if (isset($_GET['attempt'])){
                                        echo "<br/>";
                                        echo "<script type='text/javascript'>
                                        alert('Error: That is not a valid username and password ')
                                        </script>";
                                        echo "<p style='color:red;' align = 'center'>" . "Number of failed attempts: "  . $_GET['attempt'] . "<br/>" . "</p>";
                                        $number_attempt = intval($_GET['attempt']);

                                        if($number_attempt >= 3){
                                        echo "<p align = 'center'>" ."Too many failed attempts. Please contact the admin <br/>" . "</p>";
                                        }
                                    }
                                    else{
                                        $number_attempt = 0;
                                    }
                                ?>  
                            </div>
                            <p style="text-align: center;">Don't have an account? <a href="signup.php">Create an Account</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
        let setFocus = () => document.getElementById('email').focus();

        /* Will add more logic once we implement php to verify login
        document.getElementById('submit').onclick = function(){
            location.href='event_dashboard.html';
        } */
    </script>
</html>