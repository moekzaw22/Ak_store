<?php 
include('Config.php');

if (isset($_GET['PID']) && isset($_GET['QCTN']) && isset($_GET['LTP'])) {
    $PID = $_GET['PID'];
    $QCTN = $_GET['QCTN'];
    $LTP = $_GET['LTP'];

   echo $stmt1 = "UPDATE product SET Quantity = Quantity + $QCTN WHERE Link_To_CTN =  $LTP ";
    $stmt12= mysqli_query($connection,$stmt1);
    if ($stmt12 === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }
    else{
    	 $stmt2 ="UPDATE product_latkar SET Quantity = Quantity - 1 WHERE Product_ID = $LTP";
    	 $stmt22 = mysqli_query($connection,$stmt2);
    	  if ($stmt2 === false) {
            die('Prepare failed: ' . htmlspecialchars($connection->error));
        }
        else {
        		echo "<script>window.location='Product_List_latkar.php';</script>";
	

        }
    }
    exit();
}  
    
   
