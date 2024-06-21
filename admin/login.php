<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            header("Location: index.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No admin found with that username.";
    }
}
?>

<form method="post" action="">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>

<?php include('../includes/footer.php'); ?>
