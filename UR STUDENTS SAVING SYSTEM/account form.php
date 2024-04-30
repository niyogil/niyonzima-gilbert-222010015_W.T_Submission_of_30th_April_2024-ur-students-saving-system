<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Form</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Account Details</h2>
        <form id="accountForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="balance">Balance:</label>
                <input type="number" id="balance" name="balance" required>
            </div>
            <div class="form-group">
                <label for="owner">Owner:</label>
                <input type="text" id="owner" name="owner" required>
            </div>
            <div class="form-group">
                <label for="deposited">Money Deposited:</label>
                <input type="text" id="deposited" name="deposited" required>
            </div>
            <div class="form-group">
                <label for="withdrawn">Money Withdrawn:</label>
                <input type="text" id="withdrawn" name="withdrawn" required>
            </div>
            <div class="form-group">
                <label for="dateOpened">Date Opened:</label>
                <input type="date" id="dateOpened" name="dateOpened" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Prepare and bind parameters
        $stmt = $conn->prepare("INSERT INTO accounts (balance, owner, moneyDeposited, moneyWithdrawn, dateOpened) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("dssds", $balance, $owner, $moneyDeposited, $moneyWithdrawn, $dateOpened);

        // Set parameters and execute
        $balance = $_POST['balance'];
        $owner = $_POST['owner'];
        $moneyDeposited = $_POST['deposited'];
        $moneyWithdrawn = $_POST['withdrawn'];
        $dateOpened = $_POST['dateOpened'];
        $stmt->execute();{
            echo"<p>account records successfully!</p>"
        } else {
            echo"<p>Error:".$stmt->error."</p>";
        }
        

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to a success page
        header("Location: success.php");
        exit();
    }
    ?>
</body>
</html>
