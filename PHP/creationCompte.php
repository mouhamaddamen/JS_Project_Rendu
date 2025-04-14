<?php
    session_start();
    include("functions.php");

    setcookie("errorNameExist", "", time());
    setcookie("errorEmailExist", "", time());
    setcookie("formatInvalide", "", time());

    //Script du traitement du formulaire d'authentification
	if(isset($_POST["Envoyer"]) && !empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"])){
		$email=nettoyer_donnees($_POST["email"]);
        $name=nettoyer_donnees($_POST["name"]);
		$pw=nettoyer_donnees($_POST["password"]);

        setcookie("email", $email, time()+20);
        setcookie("name", $name, time()+20);
        setcookie("password", $pw, time()+20);

        if (valider_email($email) && valider_nom($name) && valider_pw($pw)) {
            $pw_hash=password_hash($pw, PASSWORD_DEFAULT);

            try{
		    	//Ouvrir la connexion à la bd
		    	require("connexionBDD.php");

                $reqSQL = "SELECT * FROM comptes WHERE email=:email";
                //préparer, exécuter la requête et récuperer le résultat
                $req = $conn->prepare($reqSQL);
                $req->execute(array(':email'=>$email));
                $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                if (empty($resultat)){
		    	    $reqSQL = "SELECT * FROM comptes WHERE name=:name";
                    //préparer, exécuter la requête et récuperer le résultat
                    $req = $conn->prepare($reqSQL);
                    $req->execute(array(':name'=>$name));
                    $resultat2 = $req->fetchAll(PDO::FETCH_ASSOC);

                    if (empty($resultat2)){
		    	        $reqSQL = "INSERT INTO comptes (email, name, pw, profilePicture, admin) VALUES (:email, :name, :pw, 'pp_default.jpg', 0)";
		    	        //préparer, exécuter la requête
		    	        $req = $conn->prepare($reqSQL);
		    	        $req->execute(array(':email'=>$email,
                                        ':name'=>$name,
                                        ':pw'=>$pw_hash));
                    }
                    else {
                        setcookie("errorNameExist", true, time()+20);
                    }
                }
                else {
                    setcookie("errorEmailExist", true, time()+20);
                }
		    	//Fermer la connexion
		    	$conn = NULL;
		    }
		    catch(Exception $e){
		    	die("Erreur : " . $e->getMessage());
		    }
        }
        else {
            setcookie("formatInvalide", true, time()+20);
        }
    }
    if (isset($resultat) && empty($resultat) && empty($resultat2)){
        header("location: page_connexion.php");
    }
    else{
        header("location: page_creation_compte.php");
    }
?>