<?php include('Config.php');

if (isset($_GET['PID']) && isset($_GET['QCTN']) && isset($_GET['LTP'])) {
    $PID = $_GET['PID'];
    $QCTN = $_GET['QCTN'];
    $LTP = $_GET['LTP'];

    // Update the product quantity
    $stmt1 = "UPDATE product SET Quantity = Quantity + $QCTN WHERE Link_To_CTN = $LTP";
    $stmt12 = mysqli_query($connection, $stmt1);
    
    if ($stmt12 === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    } else {
        // Log the action in product_history
        $stmt_log1 = "INSERT INTO product_history (product_id, action, quantity) VALUES ('$PID', 'Add to လက်လီ', '$QCTN')";
        mysqli_query($connection, $stmt_log1);

        // Update the product_latkar quantity
        $stmt2 = "UPDATE product_latkar SET Quantity = Quantity - 1 WHERE Product_ID = $LTP";
        $stmt22 = mysqli_query($connection, $stmt2);

        if ($stmt22 === false) {
            die('Prepare failed: ' . htmlspecialchars($connection->error));
        } else {

            // Redirect to the list
            echo "<script>window.location='Product_List_latkar.php';</script>";
        }
    }
    exit();
}

?>