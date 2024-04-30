<?php
$registrationErrorMessage = ""; // Initialize registration error message

// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Include database connection file
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "students_saving";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define variables and initialize with empty values
    $studentID = $fullName = $phoneNumber = $gender = $age = $dateOfBirth = $address = $email = $inputPassword = "";

    // Validate input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process form data when submitted
    $studentID = test_input($_POST["studentID"]);
    $fullName = test_input($_POST["fullName"]);
    $phoneNumber = test_input($_POST["phoneNumber"]);
    $gender = test_input($_POST["gender"]);
    $age = test_input($_POST["age"]);
    $dateOfBirth = test_input($_POST["dateOfBirth"]);
    $address = test_input($_POST["address"]);
    $email = test_input($_POST["email"]);
    $inputPassword = test_input($_POST["password"]);
    $confirmPassword = test_input($_POST["confirm_password"]);

    // Hash the password
    $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);

    // Check if passwords match
    if ($inputPassword !== $confirmPassword) {
        $registrationErrorMessage = "Error: Passwords do not match.";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO students (studentID, fullName, phoneNumber, gender, age, dateOfBirth, address, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssissss", $studentID, $fullName, $phoneNumber, $gender, $age, $dateOfBirth, $address, $email, $hashedPassword);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to success page
                header("location:login.php");
                exit();
            } else {
                $registrationErrorMessage = "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        /* Your CSS styles here */
        .success-message {
            color: green;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Registration Form</h2>
        <form id="studentForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="studentID">Student ID:</label>
                <input type="text" id="studentID" name="studentID" required>
            </div>
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth:</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirm_password" required>
            </div>
            <button type="submit" name="register" id="registerButton">Register</button>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) : ?>
                <?php if (empty($registrationErrorMessage)) : ?>
                    <div class="success-message">Registration successful!</div>
                <?php endif; ?>
            <?php endif; ?>
            <div id="registrationErrorMessage" class="error-message"><?php echo $registrationErrorMessage; ?></div>
        </form>
    </div>
</body>
</html>
