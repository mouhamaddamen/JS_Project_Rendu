<?php
include './connexionBDD.php'; // Inclusion du fichier de configuration
session_start();
// Vérifier si l'ID du bien est passé en paramètre
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Convertir l'ID en entier pour plus de sécurité

    // Récupérer les informations du bien
    $sql = "SELECT * FROM lots WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
    $bien = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bien) {
        die("Property not found.");
    }

    // Récupérer les photos (séparées par des virgules)
    $photos = !empty($bien['photos']) ? explode(',', $bien['photos']) : [];
} else {
    die("Property ID not specified.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Bien</title>
    <link rel="stylesheet" href="../CSS/property.css"> <!-- Lien vers le fichier CSS -->
    <style>
        .container {
            display: flex;
        }

        .info_lot {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            border-right: 1px solid #ddd;
        }

        .details {
            flex: 1;
            padding: 20px;
        }

        .carousel {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin: auto;
            text-align: center;
            margin-bottom: 20px;
        }

        .carousel img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .carousel button {
            position: absolute;
            top: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 24px;
            border: none;
            cursor: pointer;
            padding: 10px;
            transform: translateY(-50%);
            z-index: 1;
        }

        .carousel .prev {
            left: 0;
        }

        .carousel .next {
            right: 0;
        }

        .info-bien {
            margin-top: 20px;
        }

        .info-bien h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .info-bien p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
            display: flex;
            align-items: center;
        }

        .info-bien img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>

    <div class="container">
        <!-- Partie gauche : info_lot -->
        <div class="info_lot">

            <!-- Galerie en carousel -->
            <div class="gallery">
                <?php if (count($photos) > 0): ?>
                    <div class="carousel">
                        <button class="prev">&#10094;</button>
                        <img id="carousel-img" src="upload/<?= htmlspecialchars(trim($photos[0])) ?>" alt="Property photo">
                        <button class="next">&#10095;</button>
                    </div>
                <?php else: ?>
                    <p>No photos available for this property.</p>
                <?php endif; ?>
            </div>

            <!-- Informations du bien -->
            <div class="info-bien">
                <h2><?= htmlspecialchars($bien['identifiant'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p><?= htmlspecialchars($bien['type'], ENT_QUOTES, 'UTF-8') ?></p>
                <p>
                    <?= htmlspecialchars($bien['adresse'], ENT_QUOTES, 'UTF-8') ?><br>
                    <?= htmlspecialchars($bien['code_postal'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($bien['ville'], ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($bien['region'], ENT_QUOTES, 'UTF-8') ?>
                </p>
                <p>
                    <img src="../../img/gest_img/home.png" alt="Area">
                    <?= htmlspecialchars($bien['superficie']) ?> m²
                </p>
                <p>
                    <img src="../../img/gest_img/bed.png" alt="Bedrooms">
                    <?= htmlspecialchars($bien['nb_chambres']) ?> bedroom<?= $bien['nb_chambres'] > 1 ? 's' : '' ?>
                </p>
                <p>
                    <img src="../../img/gest_img/shower.png" alt="Bathrooms">
                    <?= htmlspecialchars($bien['salles_de_bain']) ?> bathroom<?= $bien['salles_de_bain'] > 1 ? 's' : '' ?>
                </p>
                <p>
                    <img src="../../img/gest_img/euro.png" class="icon" alt="Price">
                    Rent: €<?= number_format($bien['loyer_hors_charge'] + $bien['charges'], 0, ',', ' ') ?>
                    (including €<?= number_format($bien['charges'], 0, ',', ' ') ?> in charges)
                </p>
            </div>
        </div>

        <!-- Partie droite : vide pour l'instant -->
        <div class="details">
            <!-- Contenu à ajouter -->
        </div>
    </div>

    <script>
        const photos = <?= json_encode(array_map('trim', $photos)) ?>;
        let index = 0;

        const imgElement = document.getElementById('carousel-img');
        const nextBtn = document.querySelector('.next');
        const prevBtn = document.querySelector('.prev');

        if (photos.length > 0) {
            nextBtn.addEventListener('click', () => {
                index = (index + 1) % photos.length;
                imgElement.src = "upload/" + photos[index];
            });

            prevBtn.addEventListener('click', () => {
                index = (index - 1 + photos.length) % photos.length;
                imgElement.src = "upload/" + photos[index];
            });
        }
    </script>
      <?php include('footer.php'); ?>
      <?php include('contactbull.php'); ?>

</body>
</html>
