<?php
include('Config.php');
  
if(isset($_GET['PID'])) 
{
    $PID=$_GET['PID'];

 $purchase_Query="UPDATE sale s,product pr
             SET 
             s.status='1'
             WHERE
             s.status='0' AND s.Product_ID=pr.Barcode";

    $purchase_ret=mysqli_query($connection,$purchase_Query);
    if ($purchase_ret) {

                $select_product="SELECT * FROM product p, sale s WHERE p.Barcode=s.Product_ID AND s.Sale_ID= $PID";
                $select_query=mysqli_query($connection,$select_product);
                $product_array=mysqli_fetch_array($select_query);
                $quantity=$product_array['Quantity'];
                $product_id=$product_array['Product_ID'];
                $buyquantity=$product_array['Buy_Quantity'];
                $update="UPDATE product SET Quantity = Quantity - $buyquantity WHERE Product_ID='$product_id'";
            

            $update_query=mysqli_query($connection,$update);
            echo "<script>window.location='Sale.php';</script>";
    
exit();
}
}

?>