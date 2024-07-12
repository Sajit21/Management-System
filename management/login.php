<?php
    include "accesslist.php";
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        * {
            font-family: Poppins;
        }
        body {
            background-image: url(bgclg.png);
            margin: 0;
            padding: 0;
            background-color: rgb(243, 243, 243);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main {
            background-color: white;
            display: flex;
            border-radius: 20px;
            box-shadow: 12px 12px 5px rgba(0, 0, 0, 0.5);
            width: 86%;
            height: 575px;
        }
        .img_logo1 {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .div_logo{
            flex: 1;
        }
        .div_text {
            color: rgb(83, 83, 83);
            flex: 0.8;
        }
        #log {
            font-size: 45px;
            margin: 50px 30px 70px 0px;
            text-decoration: underline;
        }
        #naam {
            font-size: 25px;
        }
        #name {
            width: 200px;
            height: 25px;
            margin: 10px 20px 30px 40px;
            padding: 10px;
            border: none;
            border-bottom: 1px solid black;
        }
        #idnaam {
            font-size: 25px;
        }
        #uid {
            width: 200px;
            margin: 10px 20px 30px 88px;
            padding: 10px;
            border: none;
            border-bottom: 1px solid black;
        }
        .btn {
            width: max-content;
            border: 2px solid rgb(1, 98, 53);
            border-radius: 32px;
            padding: 20px 50px;
            color: rgb(1, 98, 53);
            font-weight: bold;
            background-color: white;
            margin-bottom: 5px;
            transition: opacity,background-color,color 0.75s;
        }
        .btn:hover {
            cursor: pointer;
            background-color: rgb(1, 98, 53);
            color: white;
            opacity: 0.8;
        }
        .div_text_check{
            margin-bottom: 20px;
            color: red;
            vertical-align: top;
        }
    </style>
</head>
<body>

        <div class="main">
            <div class="div_logo">
                <img src="logo.png" class="img_logo1">
            </div>
            <div class="div_text">
                <h1 id="log">Login to your account</h1>
                <form action="" method="post"> 
                    <label for="name" id="naam">Username:</label>
                    <input type="text" name="uname" id="name" placeholder="Enter Username"><br><br>
                    <label for="uid" id="idnaam">Roll no:</label>
                    <input type="password" name="uid" id="uid" placeholder="xxxxxxxxxx"><br><br>
                    
                    <input type="submit" class="btn" name="submit">
                    <div class="div_text_check">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST["submit"])) {
                                    
                                    if (!empty($_POST["uname"]) && !empty($_POST["uid"])) {
                                        $username = $_POST["uname"];
                                        $uid = $_POST["uid"];
                                        $_SESSION["uname"] = $username;
                                        $_SESSION["uid"] = $uid;
                                        $_SESSION["admin"] = false;
                                        

                                        // Check credentials
                                        if ($username == $mod["uname"] && $uid == $mod["uid"]) {
                                            $_SESSION["admin"] = true;
                                            $message = "ADMIN";
                                            header("location:admin.php");
                                        } 
                                        else {
                                            echo "<br> Invalid username or roll number.";
                                        }
                                    } 
                                    else {
                                        echo "<br> Username and roll number are required.";
                                    }
                                }
                            }
                        ?>
                    </div>
                    
                    
                </form> 
            </div>
        </div>

</body>
</html>

