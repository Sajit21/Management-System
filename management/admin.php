// we have edit ,delete option and edit option is available when we click on edit button

<?php
require_once("entrycheck_admin.php");
require('dbcopy.php');

// Fetch records from the database
$sql = "SELECT * FROM detail";
$result = $conn->query($sql);

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM detail WHERE SN = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully<br>";
    } else {
        echo "Error deleting record: " . $conn->error . "<br>";
    }
}

// Handle edit request
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phno'];
    $date = $_POST['date'];
    $address = $_POST['address'];

    $update_sql = "UPDATE detail SET name='$name', rollno='$roll', phNO='$phone', dob='$date', address='$address' WHERE SN=$edit_id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully<br>";
    } else {
        echo "Error updating record: " . $conn->error . "<br>";
    }
}
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
            margin-bottom: 30px;
            margin-top: 70px;
        }
        .register_topic{
            text-decoration:underline;
        }
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
        }
        table.large th, 
        table.large td {
            border: 1px solid #ddd; 
            padding: 8px;
            text-align: left;
        }
        table.large th {
            background-color: white;
        }
        table.large .large1 td {
            height: 200px; 
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
    <?php $currentpage = basename($_SERVER['REQUEST_URI']); ?>
    <ul class="tabs">
        <li class="tabs_option">
            <a href="admin.php" class="tabsclass" <?php if($currentpage === "admin.php"){ ?> id="tabs_selected" <?php } ?>>View</a>
        </li>
        <li class="tabs_option">
            <a href="insert.php" class="tabsclass" <?php if($currentpage === "insert.php"){ ?> id="tabs_selected" <?php } ?>>Insert</a>
        </li>
    </ul>
    <div class="div_register">
        <div class="div_table">
            <h1>Students Details</h1>
            <table class="large">
                <tr>
                    <th>Name</th>
                    <th>Rollno</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['rollno']; ?></td>
                            <td><?php echo $row['phNO']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><a href="admin.php?edit_id=<?php echo $row['SN']; ?>">Edit</a></td>
                            <td><a href="admin.php?delete_id=<?php echo $row['SN']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No records found</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <?php
        // Handle edit form
        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $edit_sql = "SELECT * FROM detail WHERE SN = $edit_id";
            $edit_result = $conn->query($edit_sql);
            if ($edit_result->num_rows > 0) {
                $edit_row = $edit_result->fetch_assoc();
        ?>
                <div class="register_top">
                    <p class="register_topic">Edit Student Information :</p>
                </div>
                <div class="register_bottom">
                    <form action="admin.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                        <label for="name">Name :</label>
                        <input type="text" name="name" class="insert" value="<?php echo $edit_row['name']; ?>">
                        <label for="roll">Roll Number :</label>
                        <input type="text" name="roll" class="insert" value="<?php echo $edit_row['rollno']; ?>">
                        <label for="phno">Phone Number :</label>
                        <input type="text" name="phno" class="insert" value="<?php echo $edit_row['phNO']; ?>">
                        <label for="date">DOB :</label>
                        <input type="date" name="date" class="insert" value="<?php echo $edit_row['dob']; ?>">
                        <label for="address">Address :</label>
                        <input type="text" name="address" class="insert" value="<?php echo $edit_row['address']; ?>">
                        <input type="submit" class="enter" value="Update">
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>
</html>
