<?php
// Database configuration
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO deposits (amount, payment_method, payment_details) VALUES (?, ?, ?)");
    $stmt->bind_param("dss", $amount, $paymentMethod, $paymentDetails);

    // Set parameters
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['paymentMethod'];
    $paymentDetails = "";

    if ($paymentMethod === 'mtn') {
        $paymentDetails = $_POST['mtnNumber'];
    } elseif ($paymentMethod === 'bank') {
        $bankName = $_POST['bankName'];
        $accountNumber = $_POST['accountNumber'];
        $paymentDetails = "Bank: $bankName, Account Number: $accountNumber";
    }

    // Execute statement
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Redirect or display success message
    header("Location: success.php");
    exit();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Platform</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1a1a192;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #a5f8be;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Deposit Platform</h2>
        <form id="depositForm" method="post">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" min="0" step="0.01" required>
                <div id="amountError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="paymentMethod">Payment Method:</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="mtn">MTN Number</option>
                    <option value="bank">Bank</option>
                </select>
            </div>
            <div id="mtnDetails" class="form-group" style="display: none;">
                <label for="mtnNumber">MTN Number:</label>
                <input type="text" id="mtnNumber" name="mtnNumber">
            </div>
            <div id="bankDetails" class="form-group" style="display: none;">
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName">
                <label for="accountNumber">Account Number:</label>
                <input type="text" id="accountNumber" name="accountNumber">
            </div>
            <button type="submit">Deposit</button>
        </form>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('depositForm');
            const paymentMethodSelect = document.getElementById('paymentMethod');
            const mtnDetails = document.getElementById('mtnDetails');
            const bankDetails = document.getElementById('bankDetails');

            paymentMethodSelect.addEventListener('change', function() {
                if (paymentMethodSelect.value === 'mtn') {
                    mtnDetails.style.display = 'block';
                    bankDetails.style.display = 'none';
                } else if (paymentMethodSelect.value === 'bank') {
                    mtnDetails.style.display = 'none';
                    bankDetails.style.display = 'block';
                } else {
                    mtnDetails.style.display = 'none';
                    bankDetails.style.display = 'none';
                }
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Fetch form data
                const amount = parseFloat(document.getElementById('amount').value);
                const paymentMethod = document.getElementById('paymentMethod').value;
                let paymentDetails;

                if (paymentMethod === 'mtn') {
                    paymentDetails = document.getElementById('mtnNumber').value;
                } else if (paymentMethod === 'bank') {
                    const bankName = document.getElementById('bankName').value;
                    const accountNumber = document.getElementById('accountNumber').value;
                    paymentDetails = `Bank: ${bankName}, Account Number: ${accountNumber}`;
                }

                // Validate amount
                const amountError = document.getElementById('amountError');
                if (isNaN(amount) || amount <= 0) {
                    amountError.textContent = 'Please enter a valid amount.';
                    return;
                } else {
                    amountError.textContent = '';
                }

                // Perform deposit operation (you can add your logic here)
                alert(`Deposit successful! Amount: $${amount.toFixed(2)}, Payment Method: ${paymentMethod}, Payment Details: ${paymentDetails}`);

                // Reset the form after successful submission
                form.reset();
                paymentMethodSelect.value = ''; // Reset payment method select
                mtnDetails.style.display = 'none'; // Hide MTN details
                bankDetails.style.display = 'none'; // Hide bank details
            });
        });
    </script>
</body>
</html>
