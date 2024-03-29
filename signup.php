<?php
    require('gameconnect-connectdb.php');
?>

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
        
    <title>Create an Account</title>
    
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

    <body onload = "setFocus()">
        <div class="container">
            <div class = "row justify-content-md-center">
                <div class = "col-md-8">
                    <center>
                        <img src = "CSS/GameLogo.png" style="width: 24em; height:auto;">
                    </center>
                    <!-- <p>Please fill out this form to create an account.</p> -->
                    <div class = "card center">
                        <h4 style = "text-align: center;" class = "m-3"> Create an Account </h4>
                        <form id = "form" action = "signup_add.php" method = "POST" class = "form m-5" onsubmit="return formVerify()">
                            <div id="form_name" class="form-group">
                                <label>Full Name</label>
                                <input type="full_name" name="full_name" id="full_name" class="form-control" onkeyup="usernameVerify()" required />
                                <p id="user_msg" class="feedback"></p>
                            </div>
                            <div id="form_email" class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" id="email" class="form-control" onkeyup = "emailVerify()" required />
                                <p id = "email_message" class = "feedback"></p>
                            </div>
                            <div id="form_password"  class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" onkeyup="passwordVerify()" value="" required />
                                <p id="pass_msg" class="feedback"></p>
                                <p>Password must contain the following:</p>
                                <ul>
                                    <li id='length'>Minimum 6 characters</li>
                                    <li id='number'>A number</li>
                                    <li id='upper'>An uppercase letter</li>
                                    <li id='lower'>A lowercase letter</li>
                                </ul>
                            </div>
                            <div id="form_confirm" class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" onkeyup="confirmPasswordVerify()" value="" required />
                                <p id=confirm_msg class="feedback"></p>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit_btn" class="btn btn-primary btn-lg btn-block" value="Create Account">
                            </div>
                            <p style="text-align: center;">Already have an account? <a href="login.php">Login</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src='JS/signup.js'></script>
</html>