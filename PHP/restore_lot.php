<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include './connexionBDD.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        $conn->beginTransaction();

        // 1. Désactiver temporairement les contraintes de clé étrangère
        $conn->exec("SET FOREIGN_KEY_CHECKS = 0");

        // 2. Récupérer les données de l'archive
        $sql = "SELECT * FROM archives WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $archive = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$archive) {
            throw new Exception("Archive non trouvée");
        }

        // 3. Insérer dans la table lots en spécifiant explicitement les colonnes
        $sql = "INSERT INTO lots (
            id, identifiant, type, adresse, adresse2, batiment, escalier, etage, numero, 
            ville, code_postal, region, type_location, loyer_hors_charge, charges, 
            frequence_paiement, superficie, nb_pieces, nb_chambres, salles_de_bain, 
            date_construction, description, locataire, photos
        ) VALUES (
            :id, :identifiant, :type, :adresse, :adresse2, :batiment, :escalier, :etage, :numero, 
            :ville, :code_postal, :region, :type_location, :loyer_hors_charge, :charges, 
            :frequence_paiement, :superficie, :nb_pieces, :nb_chambres, :salles_de_bain, 
            :date_construction, :description, :locataire, :photos
        )";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($archive);

        // 4. Supprimer l'archive
        $sql = "DELETE FROM archives WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);

        // 5. Réactiver les contraintes
        $conn->exec("SET FOREIGN_KEY_CHECKS = 1");

        $conn->commit();
        header('Location: archives.php');
        exit;
    } catch (Exception $e) {
        $conn->rollBack();
        $conn->exec("SET FOREIGN_KEY_CHECKS = 1");
        die("Erreur lors de la restauration du bien : " . $e->getMessage());
    }
} else {
    die("ID de l'archive non spécifié.");
}
?>