<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountant Form</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Accountant Form</h2>
        <form id="accountantForm" method="post" action="">
            <div class="form-group">
                <label for="accountantID">Accountant ID:</label>
                <input type="text" id="accountantID" name="accountantID" required>
            </div>
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            // Include database connection file
            $servername = "localhost";
            $username = "your_username";
            $password = "your_password";
            $dbname = "students_saving";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO accountants (accountantID, fullName, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $accountantID, $fullName, $email, $password);

            // Set parameters and execute
            $accountantID = $_POST['accountantID'];
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
            $stmt->execute();

            // Close statement and connection
            $stmt->close();
            $conn->close();

            // Redirect to a success page
            header("Location: success.php");
            exit();
        } catch (Exception $e) {
            echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
        }
    }
    ?>
</body>
</html>
