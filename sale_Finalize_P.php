<?php
include('Config.php');

// 1. Select ALL pending sale rows (status = 0)
$select_query = mysqli_query($connection, "
    SELECT s.Product_ID, s.Buy_Quantity 
    FROM sale s 
    WHERE s.Status = '0'
");

if ($select_query && mysqli_num_rows($select_query) > 0) {
    // 2. Loop through each item and subtract quantity
    while ($row = mysqli_fetch_assoc($select_query)) {
        $product_id = $row['Product_ID'];
        $buy_quantity = $row['Buy_Quantity'];

        // Reduce stock from product table
        $update = "UPDATE product SET Quantity = Quantity - $buy_quantity WHERE Product_ID = '$product_id'";
        mysqli_query($connection, $update);
    }

    // 3. Mark all those sales as confirmed (status = 1)
    mysqli_query($connection, "UPDATE sale SET Status = '1' WHERE Status = '0'");

    // 4. Redirect back to Sale.php
    echo "<script>window.location='Sale.php';</script>";
    exit();
} else {
    echo "<script>alert('No pending sale found.'); window.location='Sale.php';</script>";
}
?>
