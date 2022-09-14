<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main-heading">Employees Details</div>
    <a href="add-employee.php" class="add-new-bttn">Add New Employee</a>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Address</td>
            <td>Salary</td>
            <td>Action</td>
        </tr>
        <?php
        require_once "connect.php";
        $server_name = "localhost";
        $user_name = "root";
        $password = "";
        $db_name = "dunder_miflin";
        $conn = new mysqli($servername, $user_name, $password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM TABLE employees";
        if ($results = $conn->query($sql) === true) {
            $last = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['employee_id'] . "</td><td>" . $row['name'] . "</td>";
                echo "<td>" . $row['address'] . "</td><td>" . $row['salary'] . "</td>";
                echo '<td><i class="fa fa-eye"></i><i class="fa fa-pencil"></i></td></tr>';
            }
        }

        ?>
    </table>
</body>

</html>