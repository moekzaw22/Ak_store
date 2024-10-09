<?php
include('Config.php');

if (empty($_SESSION['Username'])) {
    include('user_navbar.php');
} else {
    include('Navbar.php');
}

// Fetch history from product_history table for all products
$query = "SELECT ph.history_id, ph.product_id, ph.action, ph.quantity, ph.date_time, p.Product_Name
          FROM product_history ph
          JOIN product p ON ph.product_id = p.Product_ID
          ORDER BY ph.date_time DESC";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product History</title>
    <link rel="stylesheet" type="text/css" href="Sale_list.css">
    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="body">
    <h2>Product History</h2>
    <button onclick="window.location.href='Product_List_Latkar.php'">Back</button>

    <table>
        <thead>
            <tr>
                <th>History ID</th>
                <th>Product Name</th>
                <th>Action</th>
                <th>Quantity</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['history_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Product_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['action']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_time']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
