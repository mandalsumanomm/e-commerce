<?php include('../includes/db.php'); ?>

<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: view_products.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
