<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>mobilia</title>
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
    <script src="../js/formValidation.js"></script>
</head>

<body>
    <main>
        <?php
        // if (isset($_SESSION["authentifie"]) && isset($_SESSION["name"])) {
        //     header("location:page_profil.php");
        // } else {
        ?>
        <form method="post" action="login.php" enctype="multipart/form-data">
            <fieldset>
	    		<legend>Login</legend>
		    	<br>
                <label>Email:</label>
			    <input type="email" name="email" id="email" placeholder="Email" required <?php if (isset($_COOKIE['email'])) {echo "value=".$_COOKIE['email'];} ?>>
                <br>
                <label>Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" required <?php if (isset($_COOKIE['password'])) {echo "value=".$_COOKIE['password'];} ?>>
                <br>
                <label for="remember">Remember me</label>
                <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE['remember'])) {echo "checked";} ?>>
                <br>
                <?php
                    if(isset($_COOKIE['errorConnexion'])){
				        echo "<p style='color:red;'>Invalid email or password</p>";
		            }
                ?>
		    	<br>
                <div class="envoie">
                    <input class="button" type="submit" name="Envoyer" value="Log in"/>
                </div>
                <p>Don't have an account? <a href="page_creation_compte.php">Create one</a></p>
            </fieldset>
		</form>
        <?php //} ?>
    </main>
    <?php include('contactbull.php'); ?>
</body>
</html>
