<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css">
    <style>
        .home {
            text-decoration: none;
            color: white;
            padding: 0.5rem 1rem;
            background-color: green;
            position: absolute;
            top:10rem;
            right:15.5rem;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.438);
            transition: 0.2s linear;
        }
    </style>
</head>
<body>
    <?php
    $id_check = "SHOW TABLE STATUS LIKE 'employees'";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dunder_miflin";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $result = $conn->query($id_check);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $employee_id = $row["Auto_increment"];
        }
    }
    $s = 0;
    $err_name = $err_phone = $err_address = $err_dob = $err_salary =$err_designation= "";
    $name = $phone = $gender = $address = $dob=$salary=$designation="";
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $dob = $_POST["dob"];
        $salary = $_POST["salary"];
        $designation=$_POST["designation"];
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
            if (!(preg_match('/^[0-9]{10}+$/', $phone)) ) {
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
            $phone = (int)$phone;
            $sql = "INSERT INTO employees(name,address,phone,date_of_birth,designation,salary,date_of_joining)
             VALUES ('$name','$address','$phone','$dob','$designation','$salary',CURDATE())";
            if ($conn->query($sql) === TRUE) {
                $lastid = $conn->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $_SESSION["phone"] = $phone;
            $conn->close();
            echo '<script>alert("Employee details has been succesfully added")</script>';
            header("Location:index.php");
            
        }
    }


    ?>
    
    <div class="head">
        <div class="container"><a class="home" href="index.php" class="back">Home</a>
            <div class="application_no"><?php echo "Employee no : $employee_id"; ?></div>
            <div class="heading">Employee Registration Form</div>
            <p>Please fill in the form below </p>
            <div class="hr"></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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