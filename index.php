<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme de Gestion Immobilière</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <?php include("./PHP/header.php");?>
    <?php
    // Check if the 'logout' query parameter is set, then destroy the session
    if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session
        header("Location: ./"); // Redirect to the home page
        exit();
    }
    ?>

    <!-- Hero Section -->
    <div class="hero relative w-full h-screen flex items-center justify-end pr-16 fade-in">
        <img src="./img/general/chat_gpt.jpg" alt="House" class="absolute top-0 left-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="relative z-10 text-right flex flex-col items-end">
            <h2 class="text-5xl font-bold tracking-wide" style="color: #f7f4e3;">
                MANAGE<br>YOUR<br>BELONGINGS
            </h2>
            <a class="mt-4 px-6 py-2 rounded text-white text-lg shadow-md view-services-btn" style="background-color: #B57948;" href="#services">
                View services
</a>
        </div>
    </div>
    <?php include("./PHP/services.php"); ?>

    <?php include("./PHP/footer.php"); ?>
    <?php include("./php/contactbull.php"); ?>

    <!-- Footer -->
</body>
</html>
