<?php
// Include database configuration file
include('Config.php');

// Start session to check if the user is logged in
if (empty($_SESSION['Username'])) {
    include('user_navbar.php');
} else {
    include('Navbar.php');
}
include('Sale_Nav.php');

// Initialize variables
$search_date = "";
$search_error = "";
$sales_data = array();
$total_amount = 0;

// Check if form is submitted with date input
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search_date'])) {
    $search_date = $_POST['search_date'];
} else {
    // If no date is searched, set today's date as default
    $search_date = date('Y-m-d');
}

// SQL query to select sales data for the specified date
$select_sale = "SELECT s.Sale_ID, 
                       pl.Product_Name AS Product_Name_Latkar, 
                       p.Product_Name AS Product_Name_Product, 
                       s.Total_Amount, 
                       pl.Barcode AS latkar_Barcode,
                       p.Barcode AS latli_Barcode,
                       s.Date, 
                       s.Time, 
                       s.Buy_Quantity 
                FROM sale s
                LEFT JOIN product_latkar pl ON s.Product_ID = pl.Barcode
                LEFT JOIN product p ON s.Product_ID = p.Barcode
                WHERE s.Status = 1 AND s.Date = ?
                ORDER BY s.Date ASC";

// Prepare and execute the query with parameter binding
if ($stmt = $connection->prepare($select_sale)) {
    $stmt->bind_param("s", $search_date);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch and store result in array
    while ($row = $result->fetch_assoc()) {
        $sales_data[] = $row;
        $total_amount += $row['Total_Amount']; // Calculate total amount
    }

    // Close statement
    $stmt->close();
} else {
    // Error handling for prepare statement
    die('Prepare failed: ' . htmlspecialchars($connection->error));
}

// Check if any results found
if (empty($sales_data)) {
    $search_error = "No sales found for " . htmlspecialchars($search_date, ENT_QUOTES, 'UTF-8') . ".";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Sales</title>
    <link rel="stylesheet" type="text/css" href="Sale_List.css">
</head>
<body>
    <div class="Navbar1">      
        <nav class="navigation2"><a href="#" class="active">All Sale</a></nav>
        <nav class="navigation2"><a href="monthly.php">Monthly</a></nav>   
        <nav class="navigation2"><a href="daily.php">Daily</a></nav>
    </div>

    <!-- Date Search Form -->
    <div class="search-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="date" id="search_date" name="search_date" style="margin-left:10px;padding:5px;font-size: 18px;" value="<?php echo htmlspecialchars($search_date, ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" name="search_button">Search</button>
        </form>
    </div>

    <!-- Display Sales Data -->
    <div class="table-container">
        <?php if (!empty($sales_data)): ?>
            <h2>Total Amount for <?php echo htmlspecialchars($search_date, ENT_QUOTES, 'UTF-8'); ?>: <?php echo number_format($total_amount, 2); ?> Ks</h2>
<?php
// Query for လက်ကား (wholesale)
$select_latkar = "SELECT s.Product_ID, pl.Product_Name, SUM(s.Buy_Quantity) AS total_quantity 
                  FROM sale s
                  JOIN product_latkar pl ON s.Product_ID = pl.Barcode
                  WHERE s.Date = '$search_date'
                  GROUP BY s.Product_ID";
$select_query1 = mysqli_query($connection, $select_latkar);

// Query for လက်လီ (retail)
$select_latli = "SELECT s.Product_ID, p.Product_Name, SUM(s.Buy_Quantity) AS total_quantity 
                 FROM sale s
                 JOIN product p ON s.Product_ID = p.Barcode
                 WHERE s.Date = '$search_date'
                 GROUP BY s.Product_ID";
$select_query2 = mysqli_query($connection, $select_latli);

// Create associative arrays for easy merging by Product_ID
$latkar_data = [];
while ($row = mysqli_fetch_assoc($select_query1)) {
    $latkar_data[$row['Product_ID']] = [
        'Product_Name' => $row['Product_Name'],
        'Latkar_Qty' => $row['total_quantity'],
        'Latli_Qty' => 0
    ];
}

while ($row = mysqli_fetch_assoc($select_query2)) {
    if (isset($latkar_data[$row['Product_ID']])) {
        $latkar_data[$row['Product_ID']]['Latli_Qty'] = $row['total_quantity'];
    } else {
        $latkar_data[$row['Product_ID']] = [
            'Product_Name' => $row['Product_Name'],
            'Latkar_Qty' => 0,
            'Latli_Qty' => $row['total_quantity']
        ];
    }
}

// Output table
echo "<table border='1'>";
echo "<tr><th colspan='3'>နေ့စွဲ: $search_date</th></tr>";
echo "<tr><th>Product Name</th><th>လက်ကား Qty</th><th>လက်လီ Qty</th></tr>";

foreach ($latkar_data as $data) {
    echo "<tr>";
    echo "<td>{$data['Product_Name']}</td>";
    echo "<td>{$data['Latkar_Qty']}</td>";
    echo "<td>{$data['Latli_Qty']}</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($connection);

?>



            <table border='1' id='allsale' cellpadding='5' cellspacing='0'>
                <thead>
                    <tr>
                        <th>Product Name (လက်ကား)</th>
                        <th>Product Name (လက်လီ)</th>
                        <th>Buy Quantity</th>
                        <th>Total Amount</th>
                
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sales_data as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Product_Name_Latkar'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['Product_Name_Product'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($row['Buy_Quantity'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars(number_format($row['Total_Amount']), ENT_QUOTES, 'UTF-8'); ?> Ks</td>
                           
                            <td><?php echo htmlspecialchars($row['Time'], ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($search_error): ?>
            <p><?php echo $search_error; ?></p>
        <?php endif; ?>
    </div>

</body>
</html>