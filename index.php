<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="fn-runner"></div>
    <div class="master-container">
        <div class="header">
            <div class="main-heading">Employees Details</div>
            <i class="fa fa-plus bttn fa1"></i>
            <a href="add-employee.php" class="add-new-bttn">Add New Employee</a>
        </div>
        <div class="table">
            <div class="row">
                <div class="dark t-head">#</div>
                <div class="dark t-head">Name</div>
                <div class="dark t-head">Address</div>
                <div class="dark t-head">Salary</div>
                <div class="dark t-head">Action</div>
            </div>
            <?php
            $db_check = "CREATE DATABASE IF NOT EXISTS dunder_miflin";
            $tb_check = "CREATE TABLE IF NOT EXISTS employees(employee_id int(6) AUTO_INCREMENT PRIMARY KEY,name varchar(20),date_of_birth date,address varchar(80),phone bigint,designation varchar(25),date_of_joining date,salary bigint);";
            $server_name = "localhost";
            $user_name = "root";
            $password = "";
            $db_name = "dunder_miflin";
            $conn = new mysqli($server_name, $user_name, $password);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if ($conn->query($db_check) === TRUE) {
                $lastid = $conn->insert_id;
            } else {
                echo "Error: " . $db_check . "<br>" . $conn->error;
            }
            $conn->close();
            $conn = new mysqli($server_name, $user_name, $password, $db_name);
            if ($conn->query($tb_check) === TRUE) {
                $lastid = $conn->insert_id;
            } else {
                echo "Error: " . $tb_check . "<br>" . $conn->error;
            }
            $z=0;
            $sql = "SELECT * FROM employees";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $i=$row["employee_id"];
                    if ($z % 2 == 0) {
                        echo "<div class='row'><div class='light'>" . $row['employee_id'] . "</div><div class='light'>" . $row['name'] . "</div>";
                        echo "<div class='light'>" . $row['address'] . "</div><div class='light'>" . $row['salary'] . "</div>";
                        echo '<div class="light">
                        <a href="show.php?id='.$row["employee_id"].'"><i class="fa fa-eye"></i></a>
                        <a href="edit.php?id='.$row["employee_id"].'"><i class="fa fa-pencil"></i></a>
                        <a href="delete.php?id='.$row["employee_id"].'"><i class="fa fa-trash"></i></a></div></div>';
                    } else {
                        echo "<div class='row'><div class='dark'>" . $row['employee_id'] . "</div><div class='dark'>" . $row['name'] . "</div>";
                        echo "<div class='dark'>" . $row['address'] . "</div><div class='dark'>" . $row['salary'] . "</div>";
                        echo '<div class="dark">
                        <a href="show.php?id='.$row["employee_id"].'"><i class="fa fa-eye"></i></a>
                        <a href="edit.php?id='.$row["employee_id"].'"><i class="fa fa-pencil"></i></a>
                        <a href="delete.php?id='.$row["employee_id"].'"><i class="fa fa-trash"></i></a></div></div>';
                    }
                    $z+=1;
                }
            } else {
                echo "<div class='no-rows'>The are no data in the table</div>";
            }
            ?>
        </div>
    </div>
</body>

</html>