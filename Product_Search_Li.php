<?php
include('Config.php');

if (isset($_GET['btnsubmit'])) {
    $search_by = $_GET['search_by'];
    $search_term = $_GET['txtsearch'];

    if ($search_by === 'product_name') {
        $search_query = "SELECT p.Link_To_CTN, pl.Product_ID AS latkar_ID, p.Product_ID AS Parent_Product_ID, p.Product_Name AS Parent_Product_Name, pl.Product_Name, pl.Quantity, pl.Quantity_Per_Package, pl.Buy_Price, pl.Sell_Price 
                        FROM product pl 
                        LEFT JOIN product p ON pl.Product_ID = p.Link_To_CTN
                        WHERE pl.Product_Name LIKE '%$search_term%'";
    } elseif ($search_by === 'product_id') {
        $search_query = "SELECT p.Link_To_CTN, pl.Product_ID AS latkar_ID, p.Product_ID AS Parent_Product_ID, p.Product_Name AS Parent_Product_Name, pl.Product_Name, pl.Quantity, pl.Quantity_Per_Package, pl.Buy_Price, pl.Sell_Price 
                        FROM product pl 
                        LEFT JOIN product p ON pl.Product_ID = p.Link_To_CTN
                        WHERE pl.Product_ID = '$search_term'";
    }

    $query = mysqli_query($connection, $search_query);

    if (!$query) {
        die('Query failed: ' . mysqli_error($connection));
    }

    $count = mysqli_num_rows($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Search</title>
</head>
<body>
    <h2>Product Search Results</h2>
    <table>
        <tr>
            <th>Product Name (CTN code)</th>
            <th>Quantity</th>
            <th>Buy Price</th>
            <th>Sell Price</th>
            <th>Quantity Per Package</th>
            <th>Link To Product</th>
            <th colspan="3">Commands</th>
        </tr>
        <?php while ($array = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?php echo htmlspecialchars($array['Product_Name'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($array['latkar_ID'], ENT_QUOTES, 'UTF-8') . ')'; ?></td>
                <td><?php echo htmlspecialchars($array['Quantity'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo number_format(htmlspecialchars($array['Buy_Price'], ENT_QUOTES, 'UTF-8')); ?></td>
                <td><?php echo number_format(htmlspecialchars($array['Sell_Price'], ENT_QUOTES, 'UTF-8')); ?></td>
                <td><?php echo htmlspecialchars($array['Quantity_Per_Package'], ENT_QUOTES, 'UTF-8'); ?></td>
                <?php if (empty($array['Parent_Product_Name'])) : ?>
                    <td>Not connected to latli</td>
                <?php else : ?>
                    <td><a href="ExtractingPackage.php?PID=<?php echo htmlspecialchars($array['Parent_Product_ID'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($array['Parent_Product_Name'], ENT_QUOTES, 'UTF-8'); ?></a></td>
                <?php endif; ?>
                <td><a href="ExtractingPackage.php?PID=<?php echo htmlspecialchars($array['Parent_Product_ID'], ENT_QUOTES, 'UTF-8'); ?>">Add to လက်လီ</a></td>
                <td><a href="Product_Latkar_Restock.php?PID=<?php echo htmlspecialchars($array['latkar_ID'], ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php mysqli_close($connection); ?>
