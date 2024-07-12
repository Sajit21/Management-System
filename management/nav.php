<?php
    require_once("entrycheck_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            font-family: Poppins;
        }
        nav{
            font-family: Poppins;
            padding: 5px 10px 5px 10px;
            border-radius: 20px;
            background-color: whitesmoke;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 50px;
        }
        .img_logo{
            width: 100%;
            height: auto;
        }
        .div_logo{
            display: inline-block;
            width:100px;
        }
        .div_text{
            display: inline-block;
            font-weight: 700;
            color:rgb(1,98,53) ;
            vertical-align: middle;
            font-size: 28px;
            flex: 1;
            padding: 0px 8px 0px 8px;
            text-align: center;
        }
        .div_user{
            width:200px;
        }
        .button_user{
            padding: 10px 30px 10px 30px;
            border: solid 2px rgb(1,98,53);
            border-radius: 20px;
            color: rgb(1,98,53);
            font-weight: bold;
        }
        .button_user_logout{
            padding: 10px 10px 10px 10px;
            border: solid 2px rgb(227,0,0);
            border-radius: 20px;
            color: rgb(227,0,0);
            font-weight: bold;
            transition: background-color,color 0.3s;
        }
        .button_user_logout:hover{
            background-color:rgb(227,0,0) ;
            color: white;
        }

        /*.logout{
            text-decoration: none;
            color: rgb(227,0,0);
            transition: color 0.3s;
        }
        .logout:hover{
            text-decoration: none;
            color: white;
        }
        .logout:visited { 
            text-decoration: none;  
        }*/
        .button_user_logout:hover{
            cursor: pointer;
            background-color: rgb(227,0,0);
            color: white;
        }

    </style>
</head>
<body>
    <nav>
        <div class="div_logo">
            <img class="img_logo" src="logo.png" alt="">
        </div>

        <div class="div_text">
            Students Fee Management System
        </div>

        <div class="div_user">
            <button class="button_user" >
                <?php
                    echo $_SESSION["uname"];
                ?>
            </button>
            <button class="button_user_logout" onclick="location.href='logout.php'">
                Log Out
            </button>
        </div>
    </nav>
    
</body>
</html>