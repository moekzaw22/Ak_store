<?php 
	include('Config.php');

if (empty($_SESSION['Username'])) {
    include('user_navbar.php');
} else {
    include('Navbar.php');
}

date_default_timezone_set("Asia/Yangon");

$current_date = date('Y-m-d');
	$select_count = "SELECT s.Product_ID, pl.Product_Name, SUM(s.Buy_Quantity) AS total_quantity 
						FROM sale s
						JOIN product_latkar pl ON s.Product_ID = pl.Barcode
						WHERE s.Date = '$current_date'
						GROUP BY s.Product_ID";
	$select_query = mysqli_query($connection,$select_count);
	$select_count = mysqli_num_rows($select_query);
	echo "<table>";
		echo "<tr>";
		echo "<td>Product Name</td>";
		echo "<td>Sale Quantity</td></tr>";
	for ($i=0; $i < $select_count; $i++) { 
			$array = mysqli_fetch_array($select_query);
			
			echo "<tr><td>".$array['Product_Name']."</td>";
			echo "<td>".$array['total_quantity']."</td></tr>";
	}
	echo "</table>"
 ?>