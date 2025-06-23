<?php 
include('Config.php');
if (empty($_SESSION['Username'])) {
  include('user_navbar.php');
}
else{
   include('Navbar.php');
}
if (isset($_POST['btnsubmit'])) {
	$name = $_POST['txtname'];
	$barcode = $_POST['numbarcode'];
	$quantity = $_POST['numquantity'];
	$linktoctn = $_POST['numquantityCTN'];
	if (empty($linktoctn)) {
		$linktoctn= '0';
	}
	else{
		$linktoctn = $_POST['numquantityCTN'];

	}
	$linktoctn = $_POST['numquantityCTN'];
	$buyprice = $_POST['numbuyprice'];
	$sellprice = $_POST['numsellprice'];
	echo $query ="INSERT INTO product VALUES 
			('','$name','$barcode','$quantity','$quantityctn','$buyprice','$sellprice')";
	$query_check = mysqli_query($connection,$query);
	if ($query_check) {
		echo "<script>alert('Product Added Successful. 0 Error Found')</script>";
	}else{
		echo "<script>alert('Product Added fail Successful. 0 Error Found')</script>";
	}
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="Entry.css">

 </head>
 <body>
 	<form action="Product_Entry.php" method="POST">
 		<div class="Navbar">
        <div class="Sale" id="categorySale">
              <nav class="navigation1"><a href="Sale_LatKar.php">Sale လက်ကား</a></nav>
            <nav class="navigation1"><a href="sale.php">Sale လက်လီ</a></nav>
               <nav class="navigation1"><a href="Restock_casher.php">Restock</a></nav>
                <nav class="navigation1 active"><a href="Product_Entry.php">Entry latli</a></nav>
                 <nav class="navigation1"><a href="Product_Entry_latkar.php">Entry latkar</a></nav>
      
        </div>
        </div>
 <div style="margin-left: 10px;">
 	<h1>လက်လီ အဝင်</h1>
 	<div class="Entry-div">
 		<label>Name</label>
 		<input type="text" name="txtname" autofocus required>
 	</div><br>
 	<div class="Entry-div">
 		<label>Barcode</label>
 		<input type="text" name="numbarcode" required>
 	</div><br>
 	<div class="Entry-div">
 		<label>Quantity</label>
 		<input type="number" name="numquantity" required>
 	</div><br>
 	<div class="Entry-div">
 		<label>Link To CTN</label>
 		<input type="number" name="numquantityCTN" placeholder="လက်ကားနဲ့ချိတ်ဆက်ရန်" required>
 	</div><br>
 	<div class="Entry-div">
 		<label>Buy Price</label>
 		<input type="number" name="numbuyprice" required>
 	</div><br>
 	<div class="Entry-div">
 		<label>Sell Price</label>
 		<input type="numdber" name="numsellprice" required>
 	</div><br>
 	<div class="Button-div">
 		<label></label>
 		<input type="submit" name="btnsubmit">
 	</div>
 	</div>
 	</form>
 </body>
 </html>