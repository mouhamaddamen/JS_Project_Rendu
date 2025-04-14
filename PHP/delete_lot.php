<?php
include './connexionBDD.php'; // Inclusion du fichier de configuration

try {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = (int) $_GET['id'];

        // Vérifier si le lot existe
        $sql = "SELECT * FROM lots WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $lot = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($lot) {
            // Insérer les données dans la table archives
            $sql = "INSERT INTO archives (
                id, identifiant, type, adresse, adresse2, batiment, escalier, etage, numero, ville, code_postal, region,
                type_location, loyer_hors_charge, charges, frequence_paiement, superficie, nb_pieces, nb_chambres,
                salles_de_bain, date_construction, description, locataire
            ) VALUES (
                :id, :identifiant, :type, :adresse, :adresse2, :batiment, :escalier, :etage, :numero, :ville, :code_postal, :region,
                :type_location, :loyer_hors_charge, :charges, :frequence_paiement, :superficie, :nb_pieces, :nb_chambres,
                :salles_de_bain, :date_construction, :description, :locataire
            )";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':id' => $lot['id'],
                ':identifiant' => $lot['identifiant'],
                ':type' => $lot['type'],
                ':adresse' => $lot['adresse'],
                ':adresse2' => $lot['adresse2'],
                ':batiment' => $lot['batiment'],
                ':escalier' => $lot['escalier'],
                ':etage' => $lot['etage'],
                ':numero' => $lot['numero'],
                ':ville' => $lot['ville'],
                ':code_postal' => $lot['code_postal'],
                ':region' => $lot['region'],
                ':type_location' => $lot['type_location'],
                ':loyer_hors_charge' => $lot['loyer_hors_charge'],
                ':charges' => $lot['charges'],
                ':frequence_paiement' => $lot['frequence_paiement'],
                ':superficie' => $lot['superficie'],
                ':nb_pieces' => $lot['nb_pieces'],
                ':nb_chambres' => $lot['nb_chambres'],
                ':salles_de_bain' => $lot['salles_de_bain'],
                ':date_construction' => $lot['date_construction'],
                ':description' => $lot['description'],
                ':locataire' => $lot['locataire']
            ]);

            // Supprimer le lot de la table lots
            $sql = "DELETE FROM lots WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            // Redirection après suppression
            header('Location: ../index.php?success=1');
            exit;
        } else {
            die("Erreur : Lot non trouvé.");
        }
    } else {
        die("Erreur : ID invalide ou non spécifié.");
    }
} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
?>