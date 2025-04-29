<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="stlye.css"> </link>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
   <?php 
    include "header.php";

    ?>


    <!--home-->
    
        <div class="home-image">
            <img src="images/Clothes for girls.png" width="100%">
    
        </div>
    <!--about-->
    <section class="about" id="about">
        <div class="about-image">
            <img src="images\red1.jpg" width="300px" height="400px">
        </div>
        <div class="about-text">
            <h2>Welcome</h2>
            <p>Where style meets Elegance! Discover trendy, affordable, and high-qyality fashion tailored just for you. Explore our latest collections and find the perfect outfit to express your unique style.</p>
            <p>Shop now and step into a world of elegance with ODERA </p>
            <a href="shop.php" class="btn">Shop Now</a>
        </div>
    </section>
<?php
    include "footer.php";
    ?> 
   
    
   
       

    <script src="script.js"></script>
    <script src="cart.js"></script>
</body>

</html>
