// some chnages have been done 
<?php
// session_start();
require_once("entrycheck_admin.php");
require('dbcopy.php');

$db_check_query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$db_check_result = $conn->query($db_check_query);

if ($db_check_result->num_rows > 0) {
    echo "Database already exists<br>";
} else {
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    } else {
        echo "Error while creating database: " . $conn->error . "<br>";
    }
}

// $conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS `detail` (
    `SN` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `rollno` INT NOT NULL,
    `phNO` BIGINT NOT NULL,
    `dob` DATE NOT NULL,
    `address` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`SN`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully or already exists<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $uname = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phno'];
    $date = $_POST['date'];
    $address = $_POST['address'];

    $sql2 = "INSERT INTO detail (name, rollno, phNO, dob, address) VALUES ('$uname', $roll, $phone, '$date', '$address')";
    if($conn->query($sql2)==True)
    {
        echo "data inserted successfully";
    }
    else{
        echo "some issue while inserting";
    }

   

}

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Insert Page</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
    <style>
        *{
            font-family: Poppins;
        }
        body{
            margin: 0;
            padding: 10px;
            background-image: url(sagarmathabg.png);
        }
        nav{
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

        .div_register{
            background-color: whitesmoke;
            display: flex;
            flex-direction: column; 
            padding: 10px 6px 20px 6px;
            border-radius: 10px;
            margin-top:0;

            
            
        }
        .register_top{
            flex: 1;
            font-size: 30px;
            text-decoration: underline;
            margin-bottom: 30px;
            margin-top: 10px;


        }
        .register_bottom{
            /* flex: 5;
              flex-direction:column;             */
              /* flex-direction:column; */
              display:flex;
              align-item:center;
              justify-content:center;
            margin-top: 8px;
            margin-bottom: 60px;
            
            
        }
        .register_bottom form{
              /* margin-top:2vh;  */
              flex-direction:column;
              display:flex;
            margin-top: 8px;
            margin-bottom: 60px;
            
            
        }
   
        .ent
        .enter {
            /* margin-top:5vh; */
            padding: 10px 40px 10px 40px;
            background-color:rgb(1,98,53);
            border: none;
            border-radius: 20px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            float: right;
            transition: opacity 0.25s;
        }
        .enter:hover{
            cursor: pointer;
            opacity: 0.5;
        }
        .enter:active{
            cursor: pointer;
            opacity: 0.3;
        }
        .insert{
            margin-right: 20px;
            border: none;
            border-bottom:2px solid grey;
            font-size: 18px;
        }
        .table_div{
            background-color: whitesmoke;
        }
        

        table.large {
            width: 100%;
            border-collapse: collapse;
            /* text-align: center; */
        }

        table.large th, 
        table.large td {
            border: 1px solid #ddd; 
            /* light gray color */
            padding: 8px;
            text-align: left;
        }

        table.large th {
            background-color: white;

            /* very light color */
        }

        table.large .large1 td {
            height: 200px; /* Set a large height for the row */
            background-color: white;
        }
        h1{
            text-align: center;
            margin-bottom: 40px;
            text-decoration: underline;
        }
        .tabs{
            padding:0;
            font-size:25px;
            margin-bottom:0;
        }
        .tabs_option{
            display:inline-block;
            margin:0;
            margin-right:20px;
            padding:0;
        }
        a.tabsclass{
            text-decoration:none;
            color:white;
            font-weight:900;
            margin-bottom:0;


        }
        a.tabsclass:hover{
            color: rgb(232, 232, 232);            

        }

        #tabs_selected{
            background-color: white;
            color:rgb(1,98,53);
            border-radius:20px 20px 0px 0px;
            padding:12px 16px 12px 16px;
        }

    </style>
</head>
<body>
    <?php $currentpage=basename($_SERVER['REQUEST_URI']);?>
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

    <ul class="tabs">
        <li class="tabs_option">
            <a href="admin.php" class="tabsclass" <?php if($currentpage==="admin.php"){ ?> id="tabs_selected" <?php } ?>> View</a>
        </li>

        <li class="tabs_option">
        <a href="insert.php" class="tabsclass" <?php if($currentpage==="insert.php"){ ?> class="tabs_selected" <?php } ?>> Insert</a>

        </li>
    </ul>

   
    <div class="div_register">
        <div class="register_top">
            Insert Student Information :
        </div>

        <!-- <div class="register_bottom">
        name, rollno, phNO, dob, address       
            <form action="insert.php" method="POST">
                <label for="">Name :</label>
                <input type="text" name="name" class="insert">
                <label for="">Roll Number :</label>
                <input type="text" name="roll" class="insert">
                <label for="">Phone Number :</label>
                <input type="text" name="phno" class="insert">
                <label for="">DOB :</label>
                <input type="date" name="date" class="insert">
                <label for="">Address :</label>
                <input type="text" name="address" class="insert">
                <input type="submit" class="enter">
            </form>

          
        </div>   -->
        <div class="register_bottom">
            <form action="insert.php" method="POST">
                <label for="name">Name :</label>
                <input type="text" name="name" class="insert">
                <label for="roll">Roll Number :</label>
                <input type="text" name="roll" class="insert">
                <label for="phno">Phone Number :</label>
                <input type="text" name="phno" class="insert">
                <label for="date">DOB :</label>
                <input type="date" name="date" class="insert">
                <label for="address">Address :</label>
                <input type="text" name="address" class="insert">
                <input type="submit" class="enter">
            </form>
        </div>
        <hr> 

        <!-- <div class="div_table">

            <h1>Students Details</h1>
            <form action="insert.php" method="POST">
                <fieldset id="field">
                    <label for="name">Name:</label>
                    <input type="text" name="uname" value="uname">
                    <label for="roll">ROllno:</label>
                    <input type="password" name="roll" value="roll">
                    <label for="name">Name:</label>
                    <input type="text" name="uname" value="uname">

                    
                    




                </fieldset>

            </form>


                
       
        </div> -->


    
    </div>
</body>
</html>
