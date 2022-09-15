<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
    <style>
        
    </style>
</head>

<body>
    <?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "dunder_miflin";
    $id = $_GET["id"];
    $sql_1 = "select * from employees where employee_id=$id";
    $conn = new mysqli($server_name, $user_name, $password, $db_name);
    $result = $conn->query($sql_1);
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
    $sql_2 = "DELETE FROM employees WHERE employee_id=$id";
    $conn->query($sql_2) ;
    if (isset($_POST["submit"])) {
        header("Location:index.php");
    }

    ?>
    <div class="master-container">
        <div class="header">
            <div class="main-heading">The following record has been deleted</div>
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
  
</body>

</html>