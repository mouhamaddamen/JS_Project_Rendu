<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Super Sith</title>
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="../js/formValidation.js"></script>
</head>

<body>
    <main>
        <?php
        // if (isset($_SESSION["authentifie"])) {
        //     header("location:page_profil.php");
        // } else {
        ?>
        <form method="post" action="./creationcompte.php" enctype="multipart/form-data">
            <fieldset>
	            <legend>Create your account</legend>
                <br>
                <label>Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" required pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$" <?php if (isset($_COOKIE['email'])) {echo "value=".$_COOKIE['email'];} ?>>
	            <br>
                <label>Username:</label>
                <input type="text" name="name" id="name" placeholder="Username" required pattern="^[A-Za-z0-9-'_ ]{1,40}$" maxlength="40" <?php if (isset($_COOKIE['name'])) {echo "value=".$_COOKIE['name'];} ?>>
	            <br>
                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" <?php if (isset($_COOKIE['password'])) {echo "value=".$_COOKIE['password'];} ?>>
	            <ul id="password-conditions">
                    <li id="uppercase">At least one uppercase letter</li>
                    <li id="lowercase">At least one lowercase letter</li>
                    <li id="number">At least one number</li>
                    <li id="special">At least one special character</li>
                    <li id="length">Must be at least 8 characters long</li>
                </ul>
                <?php 
                    if (isset($_COOKIE['errorEmailExist'])) {
                        echo "<p style='color:red;'>This email address is already taken</p>";
                    }
                    else if (isset($_COOKIE['errorNameExist'])) {
                        echo "<p style='color:red;'>This username is already taken</p>";
                    }
                    else if (isset($_COOKIE['formatInvalide'])) {
                        echo "<p style='color:red;'>Invalid format</p>";
                    }
                ?>
                <div class="envoie">
                    <input class="button" type="submit" name="Envoyer" value="Create Account"/>
                </div>
                <p>Already have an account? <a href="page_connexion.php">Log in</a></p>
            </fieldset>
        </form>
        <?php //} ?>
    </main>
    <?php include('contactbull.php'); ?>

</body>
</html>