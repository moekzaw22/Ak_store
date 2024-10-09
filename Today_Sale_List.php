<?php 
include('Config.php');

if (empty($_SESSION['Username'])) {
    include('user_navbar.php');
} else {
    include('Navbar.php');
}

date_default_timezone_set("Asia/Yangon");

// Get the current date in 'Y-m-d' format
$current_date = date('Y-m-d');

// Query to select sales data for both product_latkar (wholesale) and product (retail) tables
$select_sale_combined = "
    SELECT p.Product_Name, s.Buy_Quantity, s.Total_Amount, s.Date, s.Time
    FROM sale s
    LEFT JOIN product_latkar pl ON s.Product_ID = pl.Barcode
    LEFT JOIN product p ON s.Product_ID = p.Barcode
    WHERE s.Status = 1 AND s.Date = ?
    ORDER BY p.Product_Name
";

// Total sales amount for wholesale
$total_sales_wholesale_query = "
    SELECT SUM(s.Total_Amount) AS totalsum 
    FROM sale s 
    JOIN product_latkar pl ON s.Product_ID = pl.Barcode
    WHERE s.Status = 1 AND s.Date = ?
";

// Total sales amount for retail
$total_sales_retail_query = "
    SELECT SUM(s.Total_Amount) AS totalsum 
    FROM sale s 
    JOIN product p ON s.Product_ID = p.Barcode
    WHERE s.Status = 1 AND s.Date = ?
";

echo "<h1>Sale For " . $current_date . "</h1>";

// Get total sales amounts
$total_wholesale_stmt = $connection->prepare($total_sales_wholesale_query);
$total_wholesale_stmt->bind_param("s", $current_date);
$total_wholesale_stmt->execute();
$total_wholesale_result = $total_wholesale_stmt->get_result();
$total_wholesale_row = $total_wholesale_result->fetch_assoc();
$total_wholesale_sum = $total_wholesale_row['totalsum'] ?: 0; // Default to 0 if NULL

$total_retail_stmt = $connection->prepare($total_sales_retail_query);
$total_retail_stmt->bind_param("s", $current_date);
$total_retail_stmt->execute();
$total_retail_result = $total_retail_stmt->get_result();
$total_retail_row = $total_retail_result->fetch_assoc();
$total_retail_sum = $total_retail_row['totalsum'] ?: 0; // Default to 0 if NULL

$total_sum = $total_wholesale_sum + $total_retail_sum;

echo "<h2>Total Amount for Wholesale: " . number_format($total_wholesale_sum) . " Ks</h2>";
echo "<h2>Total Amount for Retail: " . number_format($total_retail_sum) . " Ks</h2>";
echo "<h2>Total Amount: " . number_format($total_sum) . " Ks</h2>";

// Prepare and execute the combined query
if ($stmt = $connection->prepare($select_sale_combined)) {
    $stmt->bind_param("s", $current_date);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<h3>Combined Sales Report</h3>";
        echo "<table border='1' width='100%'>";
        echo "<tr>";
        echo "<th>Product Name</th>";
        echo "<th>Buy Quantity</th>";
        echo "<th>Total Amount</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Product_Name'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($row['Buy_Quantity'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row['Total_Amount']), ENT_QUOTES, 'UTF-8') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<br>No sales on " . $current_date;
    }

    $stmt->close();
} else {
    die('Prepare failed: ' . htmlspecialchars($connection->error));
}

$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Report</title>
    <link rel="stylesheet" type="text/css" href="Sale_list.css">
</head>
<body>
</body>
</html>
