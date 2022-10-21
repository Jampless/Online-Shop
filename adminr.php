<?php include('server.php') ?>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="home.css">
        <meta name="viewport" content="width=device-width, initial-scale=10">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
        <style>
            body{
                margin: 0;
                padding: 0;
                display: flex;
                height: 100vh;
                justify-content: center;
                align-items: center;
                background: url(img/bglogin.jfif);
                background-size: cover;
                background-position: center;
                font-family: sans-serif;
            }

            .topbox{
                max-width: 700px;
                width: 100%;
                background: transparent;
            }

            .topbox image{
                width: 1170px;
                margin: auto;
            }

            .signupbox{
                max-width: 700px;
                width: 100%;
                background: #fff;
                padding: 25px 30px;
                border-radius: 10px;
            }

            .signupbox .title{
                font-size: 35px;
                font-weight: 650;
                position: relative;
            }

            .signupbox .title::before{
                content: '';
                position: absolute;
                left: 0;
                bottom: 0;
                height: 5px;
                width: 43px;
                background:  linear-gradient(135deg, #71b7e6, #f357de);
            }

            .signupbox form .user-details{
                display: flex;
                flex-wrap: wrap;
            }

            form .user-details .input-box{
                margin: 10px 0 6px 0;
                width: calc(100% / 2 - 20px);
            }

            .user-details .input-box .details{
                display: block;
                font-weight: 650;
                margin-bottom: 5px;
            }

            .user-details .input-box input{
                height: 35px;
                width: 95%;
                outline: none;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding-left: 15px;
            }

            form input[type="radio"]{
                display: none;
            }

            form .button{
                background: #f357de;
                border-radius: 50px;
                height: 45px;
                margin: 45px 0;
                
            }

            form .button input{
                height: 100%;
                width: 100%;
                outline: none;
                color: #fff;
                border: none;
                font-size: 30px;
                font-weight: 650;
                letter-spacing: 1px;
                background: url(butt.png);
                background-size: center;
                background-position: center;
                border-radius: 50px;
            }

            form .button input:hover{
                color: black;
                background: linear-gradient(135deg, #71b7e6, #f357de);

            }

            .signupbox a{
                text-decoration: none;
                font-size: 20px;
                line-height: 1px;
                color: black;
                margin-left: 46%;
            }

            .signupbox a:hover
            {
                color: blue;
            }


        </style>
    </head>

    <body>
        <div class="signupbox mt-5">
            <div class="title">Registration</div>
            <form method="post" action="register.php">

                <?php include('error.php'); ?>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" placeholder="Enter your First Name" name="firstname" required>
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" placeholder="Enter your Last Name" name="lastname" required>
                    </div>
                  
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your Username" name="username" <?php echo $username; ?>>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your Email" name="email" <?php echo $email; ?>>
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your Password" name="password_1" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm your Password" name="password_2" required>
                    </div>
                </div>
                
                <div class="button">
                    <input type="submit" name="adminreg" value="Register">
                </div>
                <a href="login.php">Login</a>
            </form>
        </div>

    </body>
</html>