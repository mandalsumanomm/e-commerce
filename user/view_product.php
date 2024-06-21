<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>" . $row['name'] . "</h1>";
        echo "<img src='/assets/images/" . $row['image'] . "' alt='Product Image'>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
    } else {
        echo "Product not found.";
    }
}
?>

<?php include('../includes/footer.php'); ?>
