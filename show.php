<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "dunder_miflin";
    $conn = new mysqli($server_name, $user_name, $password, $db_name);
    $id = $_SESSION["id"] = 3;
    $sql = "select * from employees where employee_id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["employee_id"];
            $name = $row["name"];
            $dob = $row["date_of_birth"];
            $address = $row["address"];
            $phone = $row["phone"];
            $designation = $row["designation"];
            $doj = $row["date_of_joining"];
            $salary = $row["salary"];
        }
    }
    ?>
    <div class="master-container">
        <div class="header">
            <div class="main-heading">More details on the clicked row</div>
            <a href="index.php" class="home">Home</a>
        </div>
        <div class="table">
            <div class="row">
                <div class="dark t-head">#</div>
                <div class="dark t-head">Name</div>
                <div class="dark t-head">Date of Birth</div>
                <div class="dark t-head">Address</div>
                <div class="dark t-head">Phone</div>
                <div class="dark t-head">Designation</div>
                <div class="dark t-head">Date of Joining</div>
                <div class="dark t-head">Salary</div>
            </div>
            <div class="row">
                <div class="light"><?php echo $id; ?></div>
                <div class="light"><?php echo $name; ?></div>
                <div class="light"><?php echo $dob; ?></div>
                <div class="light"><?php echo $address; ?></div>
                <div class="light"><?php echo $phone; ?></div>
                <div class="light"><?php echo $designation; ?></div>
                <div class="light"><?php echo $doj; ?></div>
                <div class="light"><?php echo $salary; ?></div>
            </div>
        </div>
        
    </div>
    <div class="btttn"><a href="edit.php" class="edit-bttn">Edit</a></div>
</body>

</html>