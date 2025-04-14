<?php
session_start();
include './connexionBDD.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Erreur : Cette page n'accepte que les requêtes POST");
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    die("Erreur : ID de lot invalide");
}
$id = (int)$_POST['id'];

// Récupérer les photos existantes
$sql = "SELECT photos FROM lots WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$lot = $stmt->fetch(PDO::FETCH_ASSOC);
$photosExistantes = !empty($lot['photos']) ? explode(',', $lot['photos']) : [];

// Traitement des nouvelles photos (upload multiple)
$uploadDir = 'upload/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (!empty($_FILES['uploaded_file']['name'][0])) {
    $maxSize = 5 * 1024 * 1024; // 5Mo
    $validExt = ['jpg', 'jpeg', 'gif', 'png'];

    $existingCount = count($photosExistantes);
    $newIndex = $existingCount + 1;

    foreach ($_FILES['uploaded_file']['tmp_name'] as $index => $tmp_name) {
        $fileName = $_FILES['uploaded_file']['name'][$index];
        $fileSize = $_FILES['uploaded_file']['size'][$index];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if ($fileSize > $maxSize || !in_array($fileExt, $validExt)) {
            continue;
        }

        // Génère le nom sous forme : 1_1.png, 1_2.png, etc.
        $formattedName = $id . '_' . $newIndex . '.' . $fileExt;
        $targetPath = $uploadDir . $formattedName;

        if (move_uploaded_file($tmp_name, $targetPath)) {
            $photosExistantes[] = $formattedName;
            $newIndex++;
        }
    }
}

// Préparation des données
$data = [
    ':id' => $id,
    ':identifiant' => htmlspecialchars($_POST['identifiant'] ?? ''),
    ':type' => htmlspecialchars($_POST['type'] ?? ''),
    ':adresse' => htmlspecialchars($_POST['adresse'] ?? ''),
    ':adresse2' => !empty($_POST['adresse2']) ? htmlspecialchars($_POST['adresse2']) : null,
    ':batiment' => !empty($_POST['batiment']) ? htmlspecialchars($_POST['batiment']) : null,
    ':escalier' => !empty($_POST['escalier']) ? htmlspecialchars($_POST['escalier']) : null,
    ':etage' => !empty($_POST['etage']) ? htmlspecialchars($_POST['etage']) : null,
    ':numero' => htmlspecialchars($_POST['numero'] ?? ''),
    ':ville' => htmlspecialchars($_POST['ville'] ?? ''),
    ':code_postal' => htmlspecialchars($_POST['code_postal'] ?? ''),
    ':region' => htmlspecialchars($_POST['region'] ?? ''),
    ':type_location' => htmlspecialchars($_POST['type_location'] ?? ''),
    ':loyer_hors_charge' => (float)($_POST['loyer_hors_charge'] ?? 0),
    ':charges' => (float)($_POST['charges'] ?? 0),
    ':frequence_paiement' => htmlspecialchars($_POST['frequence_paiement'] ?? ''),
    ':superficie' => (float)($_POST['superficie'] ?? 0),
    ':nb_pieces' => (int)($_POST['nb_pieces'] ?? 0),
    ':nb_chambres' => (int)($_POST['nb_chambres'] ?? 0),
    ':salles_de_bain' => (int)($_POST['salles_de_bain'] ?? 0),
    ':date_construction' => $_POST['date_construction'] ?? null,
    ':description' => htmlspecialchars($_POST['description'] ?? ''),
    ':locataire' => htmlspecialchars($_POST['locataire'] ?? ''),
    ':locataire_id' => !empty($_POST['locataire_id']) ? (int)$_POST['locataire_id'] : null,
    ':photos' => !empty($photosExistantes) ? implode(',', $photosExistantes) : null
];

// Requête SQL
try {
    $sql = "UPDATE lots SET 
            identifiant = :identifiant,
            type = :type,
            adresse = :adresse,
            adresse2 = :adresse2,
            batiment = :batiment,
            escalier = :escalier,
            etage = :etage,
            numero = :numero,
            ville = :ville,
            code_postal = :code_postal,
            region = :region,
            type_location = :type_location,
            loyer_hors_charge = :loyer_hors_charge,
            charges = :charges,
            frequence_paiement = :frequence_paiement,
            superficie = :superficie,
            nb_pieces = :nb_pieces,
            nb_chambres = :nb_chambres,
            salles_de_bain = :salles_de_bain,
            date_construction = :date_construction,
            description = :description,
            locataire = :locataire,
            locataire_id = :locataire_id,
            photos = :photos
            WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    header("Location: properties.php?success=1");
    exit;

} catch (PDOException $e) {
    die("Erreur SQL : " . $e->getMessage());
}
