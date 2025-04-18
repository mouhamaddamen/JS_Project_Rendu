<?php
// Détecte si on est dans le dossier PHP
$in_php_folder = str_contains($_SERVER['SCRIPT_FILENAME'], '/PHP/');
$path_suffix = $in_php_folder ? '../' : '';
?>
<!-- Déplacez la balise link dans le head de la page principale -->
<head>
<link rel="stylesheet" href="../CSS/header.css">
</head>

<header>
    <nav class="fixed top-0 w-full z-50 bg-white shadow-md flex justify-between items-center px-8 py-4 border-b" style="background-color: #f7f4e3;">
        <h1 class="text-xl" style="color: #000000;">
            PLATEFORME DE GESTION IMMOBILIÈRE
        </h1>
        <div class="flex items-center space-x-6 text-sm">
            <a href="<?php echo $path_suffix; ?>index.php" class="nav-link">Home</a>
            <a href="#contact" class="nav-link">About</a>
            <div class="more-about-container">
                <a href="#" class="nav-link">More</a>
                <div class="sidebar">
                    <?php echo (isset($_SESSION["authentifie"]) ?
                        '<a href="' . $path_suffix . 'PHP/properties.php">Property Management</a>' :
                        '<a href="' . $path_suffix . 'PHP/page_connexion.php">Property Management</a>'); ?>
                </div>
            </div>
            <?php echo (isset($_SESSION["authentifie"]) ?
                '<a class="px-6 py-2 rounded shadow-md text-white profile-btn" style="background-color: #29720E; cursor: pointer;" href="' . $path_suffix . 'PHP/page_profile.php">'
                    . $_SESSION["name"] .
                '</a>' :
                '<a class="px-6 py-2 rounded shadow-md text-white profile-btn" style="background-color: #29720E;" href="' . $path_suffix . 'PHP/page_connexion.php">
                    Profile
                </a>'); ?>
        </div>
    </nav>
</header>
