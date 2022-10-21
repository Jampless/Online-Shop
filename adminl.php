<?php include('server.php') ?>
<html>
    <head>
        <title>LogIn Form</title>
        <link rel="stylesheet" type="text/css" href="home.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            body{
                margin: 0;
                padding: 0;
                background: url(img/bg1.jpg);
                background-size: cover;
                background-position: center;
                font-family: sans-serif;
            }

            .logobox{
                width: 1300px;
                margin: auto;
            }

            .logobox img{
                width: 100px;
                float: left;
                left: 50%;
                height: auto;
                border-radius: 50%;
            }

            .topbar{
                float: right;
                list-style: none;
                margin-top: 30px;
            }

            .topbar li{
                display: inline-block;
            }
            .topbar li a{
                color: #fff;
                text-decoration: none;
                padding: 5px 20px;
                font-family: sans-serif;
                font-size: 20px;
            }

            .topbar li a:hover{
                background: pink;
                color: #333;
            }

            .loginbox{
                width: 320px;
                height: 420px;
                background: lightblue;
                color: #fff;
                top: 55%;
                left: 50%;
                position: absolute;
                transform: translate(-50%,-50%);
                box-sizing: border-box;
                padding: 70px 30px;
                border-radius: 20px;
            }

            .icon{
                width: 30%;
                height: 23%;
                border-radius: 50%;
                position: absolute;
                top: -30px;
                left: calc(46% - 30px);
            }

            h1{
                margin: 0;
                padding: 20 0 10px;
                text-align: center;
                font-size: 30px;
            }

            .loginbox p{
                margin: 0;
                padding: 0;
                font-weight: bold;
            }
            .loginbox input{
                width: 100%;
                margin-bottom: 20px;
            }

            .loginbox input[type="text"], input[type="password"]
            {
                border: none;
                border-bottom: 1px solid #fff;
                background: transparent;
                outline: none;
                height: 40px;
                color: #fff;
                font-size: 16px;
            }

            .loginbox input[type="submit"]
            {
                border: none;
                outline: none;
                height: 40px;
                background: #fb2525;
                color: #fff;
                font-size: 18px;
                border-radius: 20px;
            }

            .loginbox input[type="submit"]:hover
            {
                cursor: pointer;
                background: #ffc107;
                color: #000;
            }

            .loginbox a{
                text-decoration: none;
                font-size: 15px;
                line-height: 20px;
                color: black;
            }
            .loginbox a:hover
            {
                color: blue;
            }

            
        </style>
    </head>

    
        <div class="loginbox">
            <img src="img/icon.png" class="icon">
            <h1 style="color:black;">ADMIN</h1>
            <form method="post" action="login.php">
            <?php include('error.php'); ?>
                <p style="color:black;">Username</p>
                <input type="text" placeholder="Enter your username" name="username" style="color:black;">

                <p style="color:black;">Password</p>
                <input type="password" placeholder="Enter your password" name="password" style="color:black;">
                
                <input type="submit" name="admin" value="Login"><br>
                <center>
                <a href="login.php">User Login</a><br>
                </center>
            </form>
        </div>
    
    </body>
    
</html>