<?php
include('Config.php');

 $restock_message = "";
if (empty($_SESSION['Username'])) {
  include('user_navbar.php');
}
else{
   include('Navbar.php');
}
// Handle Restocking
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['restock_barcode'])) {
    $barcode = $_POST['restock_barcode'];
    $name = $_POST['restock_name'];
    $quantity = (int) $_POST['restock_quantity'];
    $type = $_POST['product_type']; // 'လက်ကား' or 'လက်လီ'

    if ($quantity > 0) {
        if ($type === "လက်ကား") {
            $query = "UPDATE product_latkar SET Quantity = Quantity + ? WHERE Barcode = ?";
        } else {
            $query = "UPDATE product SET Quantity = Quantity + ? WHERE Barcode = ?";
        }

        $stmt = $connection->prepare($query);
        $stmt->bind_param("is", $quantity, $barcode);
        $stmt->execute();
        $stmt->close();

        $restock_message = "<p style='color: green;'>Restocked $quantity items to $name - $barcode ($type).</p>";

    }
}

// Get products from both tables
$query = "SELECT Barcode, Quantity,Sell_Price, Product_Name, 'လက်ကား' AS Type FROM product_latkar
          UNION ALL
          SELECT Barcode, Quantity,Sell_Price, Product_Name, 'လက်လီ' AS Type FROM product";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Restock Products</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; }
        input[type="number"] { width: 70px; }
    </style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="Sale.css">
 <div class="Navbar">
        <div class="Sale" id="categorySale">
              <nav class="navigation1"><a href="Sale_LatKar.php">Sale လက်ကား</a></nav>
            <nav class="navigation1 "><a href="sale.php">Sale လက်လီ</a></nav>
             <nav class="navigation1 active"><a href="Restock_casher.php">Restock</a></nav>
              <nav class="navigation1"><a href="Product_Entry.php">Entry latli</a></nav>
                 <nav class="navigation1"><a href="Product_Entry_latkar.php">Entry latkar</a></nav>
      
        </div>
   </div>
<h2>Product Restock</h2><?php if (!empty($restock_message)) echo $restock_message; ?>

<input type="text" id="search_input" placeholder="Search by product name or barcode..." style="width: 300px; padding: 8px; font-size: 16px;">

<table id="product_table">
    <thead>
        <tr>
            <th>Type</th>
            <th>Product Name</th>
            <th>Barcode</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Restock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="product_body">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <form method="POST">
                    <td><?= htmlspecialchars($row['Type']) ?></td>
                    <td><?= htmlspecialchars($row['Product_Name']) ?></td>
                    <td><?= htmlspecialchars($row['Barcode']) ?></td>
                    <td><?= htmlspecialchars($row['Sell_Price']) ?></td>
                    <td><?= htmlspecialchars($row['Quantity']) ?></td>
                    <td>
                        <input type="number" name="restock_quantity" min="1" required onkeydown="blockSymbols(event)">

                        <input type="hidden" name="restock_barcode" value="<?= htmlspecialchars($row['Barcode']) ?>
                        ">
                         <input type="hidden" name="restock_name" value="<?= htmlspecialchars($row['Product_Name']) ?>">
                        <input type="hidden" name="product_type" value="<?= htmlspecialchars($row['Type']) ?>">
                    </td>
                    <td>
                        <button type="submit">Restock</button>
                    </td>
                </form>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
// Simple client-side filter
const searchInput = document.getElementById("search_input");
searchInput.addEventListener("input", function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll("#product_body tr");
    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});
function blockSymbols(e) {
    if (e.key === '+' || e.key === '-' || e.key === 'e' || e.key === 'E') {
        e.preventDefault();
    }
}
</script>

</body>
</html>