<?php
include('Config.php');

if (isset($_GET['PID'])) {
    $PID = $_GET['PID'];
    if (empty($PID)) {
       echo "Not connected to latli"; 
    }
    else{
    // Fetch history and product name from the database
    $query = "SELECT ph.*, pl.Product_Name 
              FROM product_history ph
              JOIN product pl ON ph.product_id = pl.Product_ID
              WHERE ph.product_id = $PID
              ORDER BY ph.date_time DESC";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($connection));
    }

    // Fetch the first row to get the product name
    if ($row = mysqli_fetch_assoc($result)) {
        $productname = $row['Product_Name'];
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product History</title>
</head>
<body>
     <a href="Product_List_latkar.php">Back</a>
    <?php if (!empty($productname)){ ?>
         <h2>Product History for <?php echo htmlspecialchars($productname); ?></h2>
    
    <table border="1">
        <thead>
            <tr>
                <th>History ID</th>
                <th>Action</th>
                <th>Quantity</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            mysqli_data_seek($result, 0);  // Reset pointer to fetch all rows again
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['history_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['action']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date_time']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php 
        } 
        else{
    ?>
   
    <h1>No Record history</h1>
   
<?php } ?>
</body>
</html>
