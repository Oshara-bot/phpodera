<?php
session_start();
require "connection.php"; // connect to DB

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; 
    $password = $_POST['password'];

    // Check if email and password match
    $result = Database::search("SELECT * FROM users WHERE email='$email' AND password='$password'");

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['idusers'];
        $_SESSION['user_name'] = $user['name'];

        // Redirect to a dashboard or home page
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stlye.css"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="login-form">
    <h1>WELCOME</h1>
    <p>Login to your account</p>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="POST" action="signin.php">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" placeholder="Enter Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>

        <button type="submit" class="signin-btn">Log In</button>

        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </form>
</div>

<?php include "footer.php"; ?>

</body>
</html>
