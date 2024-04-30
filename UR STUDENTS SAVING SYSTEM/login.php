<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    $servername = "localhost";
    $username = "root";
    $db_password = ""; // Changed the variable name to avoid conflict
    $dbname = "students_saving";

    // Create connection
    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define variables and initialize with empty values
    $email = $_POST["email"];
    $user_password = $_POST["password"]; // Changed variable name to avoid conflict
    $userType = $_POST["userType"];

    // Prepare and execute the query
    $sql = "SELECT * FROM students WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $user_password); // Changed variable name
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // Redirect users to respective dashboards based on their userType
        if ($userType === 'accountant') {
            header("Location: accountant_dashboard.html");
            exit();
        } else if ($userType === 'manager') {
            header("Location: admin_dashboard.html");
            exit();
        } else if ($userType === 'student') {
            header("Location: student_dashboard.html");
            exit();
        }
    } else {
        $errorMessage = "Invalid email or password";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ec2585;
            background-size: cover;
            background-position: center;
        }
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="options">
                <span class="option-label">Login as:</span>
                <label for="student" class="option-label">Student</label>
                <input type="radio" id="student" name="userType" class="option-input" value="student" checked>
                <label for="accountant" class="option-label">Accountant</label>
                <input type="radio" id="accountant" name="userType" class="option-input" value="accountant">
                <label for="manager" class="option-label">Manager</label>
                <input type="radio" id="manager" name="userType" class="option-input" value="manager">
            </div>
            <button type="submit" id="loginButton">Login</button>
            <div id="errorMessage" class="error-message"><?php echo $errorMessage ?? ''; ?></div>
        </form>
        <a href="register.php">Register</a> <!-- Add link to register page -->
        <div>
            <a href="student_form.php">Student Form</a>
            <a href="accountant_form.php">Accountant Form</a>
            <a href="manager_form.php">Manager Form</a>
        </div>
    </div>
</body>
</html>
