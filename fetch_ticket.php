<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ticket = null;
$error = "";

if (isset($_GET['ref_no'])) {
    $ref_no = $_GET['ref_no'];

    $sql = "SELECT * FROM booked WHERE ref_no = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $ref_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $ticket = $result->fetch_assoc();
        } else {
            $error = "No ticket found with the provided reference number.";
        }

        $stmt->close();
    } else {
        $error = "Failed to prepare the SQL statement.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .ticket-card {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .ticket-card p {
            font-size: 16px;
            margin: 10px 0;
        }
        .ticket-card .status {
            font-weight: bold;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .ticket-card .status.paid {
            background-color: #4CAF50;
        }
        .ticket-card .status.unpaid {
            background-color: #f44336;
        }
        .input-form input[type="text"], .input-form input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="input-form">
        <form method="GET" action="fetch_ticket.php">
            <label for="ref_no">Enter Reference Number:</label>
            <input type="text" id="ref_no" name="ref_no" required>
            <input type="submit" value="View Ticket">
        </form>
    </div>

    <?php if ($ticket): ?>
    <div class="ticket-card">
        <h1>Bus Ticket</h1>
        <p><strong>Reference Number:</strong> <?php echo htmlspecialchars($ticket['ref_no']); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($ticket['name']); ?></p>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($ticket['qty']); ?></p>
        <p><strong>Status:</strong> <span class="status <?php echo $ticket['status'] == 1 ? 'paid' : 'unpaid'; ?>">
            <?php echo $ticket['status'] == 1 ? 'Paid' : 'Unpaid'; ?></span>
        </p>
        <p><strong>Date Updated:</strong> <?php echo htmlspecialchars($ticket['date_updated']); ?></p>
    </div>
    <?php elseif ($error): ?>
    <div class="ticket-card">
        <p><?php echo $error; ?></p>
    </div>
    <?php endif; ?>
</body>
</html>
