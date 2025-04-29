x<?php
require "connection.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $message = $_POST['message']; 

    if (empty($name) || empty($email) || empty($message)) {
        $error = "Please fill all the fields!";
    } else {
        // Insert into comments table (only saving email + comment)
        Database::iud("INSERT INTO comments (email, comment) VALUES ('$email', '$message')");
        $success = "Thank you for your feedback!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="stlye.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="about-section">
    <h1>About Us</h1>
    <div class="about-section-content">
        <div class="text">
            <h2>WELCOME TO ODERA</h2>
            <p>Where passion meets fashion! At Odera, we believe that clothing is more than just fabric; it's a way to express your individuality and confidence. Founded with the vision of creating high-quality, trendy, and affordable apparel, we are dedicated to providing styles that suit every personality and occasion. Our designs are inspired by modern trends, yet they reflect timeless elegance. Whether you're looking for casual wear, office attire, or a glamorous outfit for a special event, Odera has something unique just for you.</p>
            <h2>OUR MISSION</h2>
            <p>To empower individuals to embrace their style and make fashion accessible to everyone.</p>
            <h2>Why Choose Odera?</h2>
            <p>
                <strong>Premium Quality:</strong> We handpick materials to ensure comfort and durability.<br>
                <strong>Affordable Prices:</strong> Style doesn't have to come at a high cost.<br>
                <strong>Customer-Centric:</strong> Your satisfaction is our priority.
            </p>
        </div>
        <img src="images/logo.jpg" alt="About Us Image">
    </div>
</div>

<div class="contact-container">
    <h2>Contact Us</h2>

    <?php 
    if (isset($error)) { echo "<p style='color:red;'>$error</p>"; }
    if (isset($success)) { echo "<p style='color:green;'>$success</p>"; }
    ?>

    <form class="contact-form" method="POST" action="aboutus.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="message">Your Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

<?php include "footer.php"; ?>

<script src="script.js"></script>
</body>
</html>