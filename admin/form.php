<?php
session_start(); // Start the session

// Connect to the database
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sis_db"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into the student_details table if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $roll = $_POST['roll'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $department = $_POST['department'];

    // Insert query to insert data into student_details table
    $sql = "INSERT INTO student_list (roll, firstname, middlename, lastname, gender, contact, present_address, permanent_address, dob, department)
            VALUES ('$roll', '$firstname', '$middlename', '$lastname', '$gender', '$contact', '$present_address', '$permanent_address', '$dob', '$department')";
if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Student details successfully saved!";
    header("Location: ./dashboard.php");
    exit();
} else {
    $_SESSION['error_message'] = "Error: " . $conn->error;
    header("Location: ./dashboard.php");
    exit();
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-top: 5px;
        }
        input[type="submit"], button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }
        .row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }
        .col-md-4 {
            flex: 1;
        }
        .card-footer {
            text-align: right;
            margin-top: 20px;
        }
        .btn-default {
            background-color: #ccc;
            color: #333;
        }
        .btn-default:hover {
            background-color: #aaa;
        }
        .form-control-sm {
            font-size: 14px;
        }
        .border-bottom {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        textarea {
            resize: vertical;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Form</h2>

    <form action="" method="POST" id="student_form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

        <fieldset class="border-bottom">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="roll" class="control-label">Student Roll</label>
                    <input type="text" name="roll" id="roll" autofocus value="<?= isset($roll) ? $roll : "" ?>" class="form-control form-control-sm rounded-0" required>
                </div>
                    <div class="form-group col-md-4">
                    <label for="department" class="control-label">Department</label>
                    <select name="department" id="department" class="form-control form-control-sm rounded-0" required>
                        <option <?= isset($department) && $department == 'Core' ? 'selected' : '' ?>>Core</option>
                        <option <?= isset($department) && $department == 'CSBS' ? 'selected' : '' ?>>CSBS</option>
                        <option <?= isset($department) && $department == 'CSIL' ? 'selected' : '' ?>>CSIL</option>
                        <option <?= isset($department) && $department == 'CSIT' ? 'selected' : '' ?>>CSIT</option>
                        <option <?= isset($department) && $department == 'IT' ? 'selected' : '' ?>>IT</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="firstname" class="control-label">First Name</label>
                    <input type="text" name="firstname" id="firstname" value="<?= isset($firstname) ? $firstname : "" ?>" class="form-control form-control-sm rounded-0" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="middlename" class="control-label">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" value="<?= isset($middlename) ? $middlename : "" ?>" class="form-control form-control-sm rounded-0" placeholder='optional'>
                </div>
                <div class="form-group col-md-4">
                    <label for="lastname" class="control-label">Last Name</label>
                    <input type="text" name="lastname" id="lastname" autofocus value="<?= isset($lastname) ? $lastname : "" ?>" class="form-control form-control-sm rounded-0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="gender" class="control-label">Gender</label>
                    <select name="gender" id="gender" class="form-control form-control-sm rounded-0" required>
                        <option <?= isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option <?= isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="dob" class="control-label">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="<?= isset($dob) ? $dob : "" ?>" class="form-control form-control-sm rounded-0" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="contact" class="control-label">Contact #</label>
                    <input type="text" name="contact" id="contact" value="<?= isset($contact) ? $contact : "" ?>" class="form-control form-control-sm rounded-0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="present_address" class="control-label">Present Address</label>
                    <textarea rows="3" name="present_address" id="present_address" class="form-control form-control-sm rounded-0" required><?= isset($present_address) ? $present_address : "" ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="permanent_address" class="control-label">Permanent Address</label>
                    <textarea rows="3" name="permanent_address" id="permanent_address" class="form-control form-control-sm rounded-0" required><?= isset($permanent_address) ? $permanent_address : "" ?></textarea>
                </div>
            </div>
        </fieldset>

        <div class="card-footer text-right">
            <button class="btn btn-flat btn-primary btn-sm" type="submit">Save Student Details</button>
            <a href="./dashboard.php" class="btn btn-flat btn-default border btn-sm">Cancel</a>
        </div>

    </form>
</div>

<script>
    const form = document.getElementById('myForm');
    const successMessage = document.getElementById('successMessage');

    form.addEventListener('submit', function(event) {
      event.preventDefault(); 
      successMessage.style.display = 'block'; 
      setTimeout(() => {
        successMessage.style.display = 'none'; 
      }, 3000);
      form.reset(); 
    });
  </script>

</body>
</html>
