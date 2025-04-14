<?php
session_start();
include './connexionBDD.php'; // Inclusion du fichier de configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $identifiant = htmlspecialchars($_POST['identifiant']);
    $type = htmlspecialchars($_POST['type']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $adresse2 = !empty($_POST['adresse2']) ? htmlspecialchars($_POST['adresse2']) : NULL;
    $batiment = !empty($_POST['batiment']) ? htmlspecialchars($_POST['batiment']) : NULL;
    $escalier = !empty($_POST['escalier']) ? htmlspecialchars($_POST['escalier']) : NULL;
    $etage = !empty($_POST['etage']) ? htmlspecialchars($_POST['etage']) : NULL;
    $numero = htmlspecialchars($_POST['numero']);
    $ville = htmlspecialchars($_POST['ville']);
    $code_postal = htmlspecialchars($_POST['code_postal']);
    $region = htmlspecialchars($_POST['region']);
    $type_location = htmlspecialchars($_POST['type_location']);
    $loyer_hors_charge = (float)$_POST['loyer_hors_charge'];
    $charges = (float)$_POST['charges'];
    $frequence_paiement = htmlspecialchars($_POST['frequence_paiement']);
    
    // Nouvelles données
    $superficie = (float)$_POST['superficie'];
    $nb_pieces = (int)$_POST['nb_pieces'];
    $nb_chambres = (int)$_POST['nb_chambres'];
    $salles_de_bain = (int)$_POST['salles_de_bain'];
    $date_construction = $_POST['date_construction'];
    $description = htmlspecialchars($_POST['description']);

    // Validation des champs obligatoires
    if (empty($adresse) || empty($ville) || empty($code_postal) || empty($type_location) || empty($loyer_hors_charge) || empty($charges) || empty($frequence_paiement)) {
        die("Tous les champs obligatoires doivent être remplis.");
    }

    // Insertion des données dans la base de données
    try {
        $sql = "INSERT INTO lots (
            identifiant, type, adresse, adresse2, batiment, escalier, etage, numero, ville, code_postal, region,
            type_location, loyer_hors_charge, charges, frequence_paiement, superficie, nb_pieces, nb_chambres,
            salles_de_bain, date_construction, description
        ) VALUES (
            :identifiant, :type, :adresse, :adresse2, :batiment, :escalier, :etage, :numero, :ville, :code_postal, :region,
            :type_location, :loyer_hors_charge, :charges, :frequence_paiement, :superficie, :nb_pieces, :nb_chambres,
            :salles_de_bain, :date_construction, :description
        )";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':identifiant' => $identifiant,
            ':type' => $type,
            ':adresse' => $adresse,
            ':adresse2' => $adresse2,
            ':batiment' => $batiment,
            ':escalier' => $escalier,
            ':etage' => $etage,
            ':numero' => $numero,
            ':ville' => $ville,
            ':code_postal' => $code_postal,
            ':region' => $region,
            ':type_location' => $type_location,
            ':loyer_hors_charge' => $loyer_hors_charge,
            ':charges' => $charges,
            ':frequence_paiement' => $frequence_paiement,
            ':superficie' => $superficie,
            ':nb_pieces' => $nb_pieces,
            ':nb_chambres' => $nb_chambres,
            ':salles_de_bain' => $salles_de_bain,
            ':date_construction' => $date_construction,
            ':description' => $description
        ]);

        // Redirection vers la page d'accueil avec un message de succès
        header('Location: properties.php?success=1');
        exit;
    } catch (PDOException $e) {
        // Gestion des erreurs de base de données
        die("Erreur lors de l'insertion du lot : " . $e->getMessage());
    }
} else {
    // Si la méthode de requête n'est pas POST, rediriger vers la page d'accueil
    header('Location: properties.php');
    exit;
}
?>
