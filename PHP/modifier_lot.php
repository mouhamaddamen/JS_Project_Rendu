<?php
include './connexionBDD.php'; // Inclusion du fichier de configuration
session_start();
// Vérifier si l'ID du lot est passé en paramètre
if (!isset($_GET['id'])) {
    die("Lot ID not specified.");
}

$id = (int)$_GET['id'];

// Récupérer les informations du lot
$sql = "SELECT * FROM lots WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$lot = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$lot) {
    die("Lot not found.");
}

// Récupérer les photos existantes (supposons qu'elles sont stockées dans un champ 'photos' séparées par des virgules)
$photosExistantes = !empty($lot['photos']) ? explode(',', $lot['photos']) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lot - <?= htmlspecialchars($lot['identifiant']) ?></title>
    <link rel="stylesheet" href="../CSS/property.css">
</head>
<body>
<?php include('header.php'); ?>

    <div class="container">
        <h1>Edit Lot - <?= htmlspecialchars($lot['identifiant']) ?></h1>

        <!-- Formulaire de modification -->
        <form action="traitement_modifier_lot.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $lot['id'] ?>">

            <!-- Section Informations générales -->
            <div class="form-section">
                <h2>General Information</h2>
                <!-- Champ Identifiant -->
                <div class="form-group">
                    <label for="identifiant">Identifier:</label>
                    <input type="text" id="identifiant" name="identifiant" value="<?= htmlspecialchars($lot['identifiant']) ?>" required>
                </div>

                <!-- Champ Type -->
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select id="type" name="type" required>
                        <option value="">Select a type</option>
                        <option value="Maison" <?= $lot['type'] == 'Maison' ? 'selected' : '' ?>>House</option>
                        <option value="Appartement" <?= $lot['type'] == 'Appartement' ? 'selected' : '' ?>>Apartment</option>
                        <option value="Bureau" <?= $lot['type'] == 'Bureau' ? 'selected' : '' ?>>Office</option>
                        <option value="Local" <?= $lot['type'] == 'Local' ? 'selected' : '' ?>>Commercial Space</option>
                    </select>
                </div>
            </div>

            <!-- Section Adresse -->
            <div class="form-section">
                <h2>Address</h2>
                <div class="form-group">
                    <label for="adresse">Address:</label>
                    <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($lot['adresse']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="adresse2">Address 2:</label>
                    <input type="text" id="adresse2" name="adresse2" value="<?= htmlspecialchars($lot['adresse2']) ?>">
                </div>

                <div class="form-group">
                    <label for="batiment">Building:</label>
                    <input type="text" id="batiment" name="batiment" value="<?= htmlspecialchars($lot['batiment']) ?>">
                </div>

                <div class="form-group">
                    <label for="escalier">Staircase:</label>
                    <input type="text" id="escalier" name="escalier" value="<?= htmlspecialchars($lot['escalier']) ?>">
                </div>

                <div class="form-group">
                    <label for="etage">Floor:</label>
                    <input type="text" id="etage" name="etage" value="<?= htmlspecialchars($lot['etage']) ?>">
                </div>

                <div class="form-group">
                    <label for="numero">Number:</label>
                    <input type="text" id="numero" name="numero" value="<?= htmlspecialchars($lot['numero']) ?>">
                </div>

                <div class="form-group">
                    <label for="ville">City:</label>
                    <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($lot['ville']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="code_postal">Postal Code:</label>
                    <input type="text" id="code_postal" name="code_postal" value="<?= htmlspecialchars($lot['code_postal']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" id="region" name="region" value="<?= htmlspecialchars($lot['region']) ?>" required>
                </div>
            </div>

            <!-- Section Informations locatives -->
            <div class="form-section">
                <h2>Rental Information</h2>
                <div class="form-group">
                    <label for="type_location">Proposed rental type:</label>
                    <select id="type_location" name="type_location" required>
                        <option value="">Select a type</option>
                        <option value="Meublée" <?= $lot['type_location'] == 'Meublée' ? 'selected' : '' ?>>Furnished</option>
                        <option value="Saisonnier" <?= $lot['type_location'] == 'Saisonnier' ? 'selected' : '' ?>>Seasonal</option>
                        <option value="Vide" <?= $lot['type_location'] == 'Vide' ? 'selected' : '' ?>>Unfurnished</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="loyer_hors_charge">Rent (excluding charges):</label>
                    <input type="number" id="loyer_hors_charge" name="loyer_hors_charge" step="0.01" value="<?= htmlspecialchars($lot['loyer_hors_charge']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="charges">Charges:</label>
                    <input type="number" id="charges" name="charges" step="0.01" value="<?= htmlspecialchars($lot['charges']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="frequence_paiement">Payment frequency:</label>
                    <select id="frequence_paiement" name="frequence_paiement" required>
                        <option value="">Select a frequency</option>
                        <option value="Annuelle" <?= $lot['frequence_paiement'] == 'Annuelle' ? 'selected' : '' ?>>Yearly</option>
                        <option value="Mensuelle" <?= $lot['frequence_paiement'] == 'Mensuelle' ? 'selected' : '' ?>>Monthly</option>
                        <option value="Trimestrielle" <?= $lot['frequence_paiement'] == 'Trimestrielle' ? 'selected' : '' ?>>Quarterly</option>
                    </select>
                </div>
            </div>

            <!-- Section Description -->
            <div class="form-section">
                <h2>Description</h2>

                <div class="form-group">
                    <label for="superficie">Area (m²):</label>
                    <input type="number" id="superficie" name="superficie" step="0.1" value="<?= htmlspecialchars($lot['superficie']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="nb_pieces">Number of rooms:</label>
                    <input type="number" id="nb_pieces" name="nb_pieces" value="<?= htmlspecialchars($lot['nb_pieces']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="nb_chambres">Number of bedrooms:</label>
                    <input type="number" id="nb_chambres" name="nb_chambres" value="<?= htmlspecialchars($lot['nb_chambres']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="salles_de_bain">Number of bathrooms:</label>
                    <input type="number" id="salles_de_bain" name="salles_de_bain" value="<?= htmlspecialchars($lot['salles_de_bain']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="date_construction">Construction date:</label>
                    <input type="date" id="date_construction" name="date_construction" value="<?= htmlspecialchars($lot['date_construction']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?= htmlspecialchars($lot['description']) ?></textarea>
                </div>
            </div>

            <!-- Section Photos -->
            <div class="form-section">
                <h2>Photos</h2>
                
                <?php if (!empty($photosExistantes)): ?>
                    <div class="existing-photos">
                        <h3>Existing photos</h3>
                        <div class="photo-gallery" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <?php foreach ($photosExistantes as $photo): ?>
                                <div class="photo-item" style="border: 1px solid #ccc; padding: 5px; border-radius: 4px;">
                                    <img src="<?= 'upload/' . htmlspecialchars(basename($photo)) ?>" alt="Lot photo" style="max-width: 200px; max-height: 200px;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="new-photos">
                    <h3>Add a photo</h3>
                    <div class="form-group">
                        <label for="uploaded_file">Select a photo:</label>
                        <input type="file" name="uploaded_file[]" accept="image/*" multiple>
                        <small>Accepted formats: JPG, JPEG, PNG, GIF. Max size: 50KB.</small>
                    </div>
                </div>
            </div>

            <!-- Boutons de soumission -->
            <div class="form-group">
                <button type="submit" name="submit" class="btn-primary">Save changes</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='gestion_lots.php'">Cancel</button>
            </div>
        </form>
    </div>
    <?php include('footer.php'); ?>
    <?php include('contactbull.php'); ?>

</body>
</html>
