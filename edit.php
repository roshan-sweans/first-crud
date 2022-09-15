<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Document</title>
    <style>
        p::after {
            transform: translate(-19.3rem);
        }
    </style>
</head>

<body>
    <?php
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "dunder_miflin";
    $conn = new mysqli($server_name, $user_name, $password, $db_name);
    $name = $phone = $gender = $address = $dob = $salary = $designation =$id= "";
    $id = $_GET["id"];
    $display = "select * from employees where employee_id=$id";

    $err_name = $err_phone = $err_address = $err_dob = $err_salary = $err_designation = $employee_id = "";
    if (isset($_POST["submit"])) {
        $employee_id=$_POST["id"];
        $temp = $employee_id;
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $salary = $_POST["salary"];
        $designation = $_POST["designation"];
        echo $temp;
        // name validation
        if (strlen($_POST["name"]) < 3) {
            $err_name = "Your name should be atleast 3 characters long";
            $s = 1;
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $err_name = "Only Alphabets  and white spaces are allowed in the Name";
                $s = 1;
            }
        }

        // phone no validation
        if (empty($phone)) {
            $err_phone = "Phone number can't be empty";
            $s = 1;
        } else {
            if (!(preg_match('/^[0-9]{10}+$/', $phone))) {
                $err_phone = "Phone number should only contain digits and can't be longer than 10 digits";
                $s = 1;
            }
        }
        // address 
        if (empty($address)) {
            $err_address = "Your need to enter your address";
            $s = 1;
        } else {
            if (strlen($address) < 6) {
                $err_address = "Address should be atleast 6 characters";
                $s = 1;
            }
        }
        // date of birth
        if (empty($dob)) {
            $err_dob = "Your need to enter your Date of birth";
            $s = 1;
        }
        // designation 
        if (empty($designation)) {
            $err_designation = "Please specify your designation";
            $s = 1;
        } else {
            if (strlen($designation) < 4) {
                $err_designation = "please ente a valid designation";
                $s = 1;
            }
        }

        // salary
        if (empty($salary)) {
            $err_salary = "Your need to enter your salary ";
            $s = 1;
        }

        if ($s == 0) {
            $update = "UPDATE employees SET name='$name',address='$address',phone='$phone',date_of_birth='$dob',designation='$designation',salary='$salary' WHERE employee_id='$temp'";
            echo $update;
            $conn->query($update);
            header("Location:index.php");
            echo '<script>alert("Employee details has been succesfully added")</script>';
        }
    }
    if (!isset($_POST["submit"])) {
        $result = $conn->query($display);
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                $employee_id = $row["employee_id"];
                $temp = $employee_id;
                $name = $row["name"];
                $dob = $row["date_of_birth"];
                $address = $row["address"];
                $phone = $row["phone"];
                $designation = $row["designation"];
                $salary = $row["salary"];
            }
        }

        $s = 0;
    }
    $conn->close();
    ?>
    <div class="head">
        <div class="container">
            <div class="application_no"><?php echo "Employee no : $employee_id"; ?></div>
            <div class="heading-contain">
                <div class="heading">Employee details</div><a class="home" href="index.php" class="back">Home</a>
            </div>
            <p>Edit emoloyee details through the form </p>
            <div class="hr"></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input class="hidden" type="text" name="id" value="<?php echo $employee_id; ?>" readonly><br>
                <input class="psuedo" type="text" name="name" value="<?php echo htmlentities($name); ?>" placeholder="Name"><br>
                <div class="err"><?php echo "$err_name"; ?></div>
                <label for="dob" class="hed">Date of Birth </label><br>
                <input class="psuedo" type="date" name="dob" value="<?php echo htmlentities($dob); ?>" placeholder="Date of Birth"><br>
                <div class="err"><?php echo $err_dob ?></div>
                <textarea class="psuedo" name="address" id="txtarea" rows="4" placeholder="Address"><?php echo $address; ?></textarea><br>
                <div class="err"><?php echo $err_address ?></div>
                <input class="psuedo" type="number" name="phone" value="<?php echo htmlentities($phone); ?>" placeholder="Phone No"><br>
                <div class="err"><?php echo $err_phone ?></div>
                <input class="psuedo" type="text" name="designation" value="<?php echo htmlentities($designation); ?>" placeholder="Designation"><br>
                <div class="err"><?php echo "$err_designation"; ?></div>
                <input class="psuedo" type="number" name="salary" placeholder="Salary" value="<?php echo htmlentities($salary); ?>"><br>
                <div class="err"><?php echo $err_salary ?></div>
                <input class="psuedo" type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>