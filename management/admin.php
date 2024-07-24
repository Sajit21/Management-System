// main access of the admin frontend

<?php
    require_once("entrycheck_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
            margin-bottom: 30px;
            margin-top: 70px;
        }
        .register_topic{
            text-decoration:underline;
        }

        <?php if(empty($_POST["edit"])){echo"
            .register_top{ pointer-events: none; color:grey}
            .register_bottom{ pointer-events: none;  color:grey}";
        }?>

        .register_bottom{
            flex: 5;
            display: flex;
            margin-top: 8px;
            margin-bottom: 60px;
            
            
        }
        .enter {
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
        .notice{
            font-size:20px;
            color:red;
            font-style:italic;
        }

    </style>
</head>
<body>
    <?php $currentpage=basename($_SERVER['REQUEST_URI']);
        include_once('nav.php');
    ?>


    <ul class="tabs">
        <li class="tabs_option">
            <a href="admin.php" class="tabsclass" <?php if($currentpage==="admin.php"){ ?> id="tabs_selected" <?php } ?>> View</a>
        </li>

        <li class="tabs_option">
        <a href="insert.php" class="tabsclass" <?php if($currentpage==="insert.php"){ ?> class="tabs_selected" <?php } ?>> Insert</a>

        </li>
    </ul>

    
    <div class="div_register">

        <div class="div_table">

            <h1>Students Details</h1>

            <table class="large" border="1px" cellpadding="1px" cellspacing="1px" width="100%">
        
        <tr>
            <th>Name</th>
            <th>Rollno</th>
            <th>Batch</th>
            <th>Fee</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr class="large1">
            <td>Name</td>
            <td>Rollno</td>
            <td>Batch</td>
            <td>Fee</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        </table>
        </div>
        <div class="register_top">
            <?php if(empty($_POST["edit"])){echo'
                <p class="notice">
                    *Only available while editing info.
                </p>';
            }?>
            <p class="register_topic">
                Edit Student Information :
            </p>
            
        </div>
        <hr>
        
        <div class="register_bottom">
            
            <form action="">
                <label for="">Name :</label>
                <input type="text" name="" class="insert">
                <label for="">Roll Number :</label>
                <input type="text" name="" class="insert">
                <label for="">Phone Number :</label>
                <input type="text" name="" class="insert">
                <label for="">DOB :</label>
                <input type="date" name="" class="insert">
                <label for="">Address :</label>
                <input type="text" name="" class="insert">
            </form>

            <input type="submit" class="enter">
        </div>  


    
    </div>
</body>
</html>
