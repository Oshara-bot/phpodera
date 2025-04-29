<?php
require "connection.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; 
    $phone = $_POST['phone']; 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $repassword = $_POST['repassword'];

    if ($password != $repassword) {
        $error = "Passwords do not match!";
    } else {
        // Check if email already exists
        $result = Database::search("SELECT * FROM users WHERE email='$email'");
        if ($result->num_rows > 0) {
            $error = "Email already registered!";
        } else {
            // Insert into database
            Database::iud("INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')");
            $success = "Account created successfully! <a href='signin.php'>Log in now</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="stlye.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="login-form">
    <h1>WELCOME</h1>
    <p>Create an account to upgrade your style</p>

    <?php 
    if (isset($error)) { echo "<p style='color:red;'>$error</p>"; }
    if (isset($success)) { echo "<p style='color:green;'>$success</p>"; }
    ?>

    <form method="POST" action="signup.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" required>

        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" placeholder="07X XXXXXXX" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>

        <label for="repassword">Re-Enter Password</label>
        <input type="password" id="repassword" name="repassword" placeholder="Re-Enter password" required>

        <button type="submit" class="login-btn">Sign Up</button>

        <p>Already have an account? <a href="signin.php">Log In</a></p>
    </form>
</div>

<?php include "footer.php"; ?>

</body>
</html>
