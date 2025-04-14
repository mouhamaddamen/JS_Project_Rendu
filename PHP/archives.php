<?php
include './connexionBDD.php'; // Include configuration file
session_start();
// SQL query to retrieve archived listings
$sql = "SELECT * FROM archives";
$stmt = $conn->query($sql);
$archives = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Archives</title>
    <link rel="stylesheet" href="../CSS/property.css"> <!-- Link to CSS file -->
</head>
<body id="property-page">
<?php include('header.php'); ?>

    <!-- Choice section -->
    <div class="loc_choice">
        <div class="title">Archives</div>
        <div class="buttons">
            <button onclick="window.location.href='properties.php'">Active ①</button>
            <button class="active">Archives ②</button>
        </div>
        <button class="new-location" onclick="window.location.href='properties.php'">Back to listings</button>
    </div>

    <!-- Archive table -->
    <div class="loc_tab">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property Name</th>
                    <th>Type</th>
                    <th>Tenant</th>
                    <th>Rent</th>
                    <th>Number of Rooms</th>
                    <th>Number of Bedrooms</th>
                    <th>Status</th>
                    <th>Area</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($archives)): ?>
                    <!-- If no archives found -->
                    <tr class="no-data">
                        <td colspan="10">
                            <p>There's nothing here: This page displays archived properties.</p>
                        </td>
                    </tr>
                <?php else: ?>
                    <!-- If archives exist -->
                    <?php foreach ($archives as $archive): ?>
                        <tr>
                            <td><?= htmlspecialchars($archive['id']) ?></td>
                            <td><?= htmlspecialchars($archive['identifiant']) ?></td>
                            <td><?= htmlspecialchars($archive['type']) ?></td>
                            <td><?= htmlspecialchars($archive['locataire']) ?></td>
                            <td><?= htmlspecialchars($archive['loyer_hors_charge'] + $archive['charges']) ?> €</td>                            
                            <td><?= htmlspecialchars($archive['nb_pieces']) ?></td>
                            <td><?= htmlspecialchars($archive['nb_chambres']) ?></td>
                            <td><?= htmlspecialchars($archive['type_location']) ?></td>
                            <td><?= htmlspecialchars($archive['superficie']) ?> m²</td>
                            <td>
                                <button class="action-button" onclick="restoreLot(<?= $archive['id'] ?>)">Restore</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php'); ?>

    <?php include('contactbull.php'); ?>


    <script>
    function restoreLot(id) {
        if (confirm("Are you sure you want to restore this property?")) {
            window.location.href = `restore_lot.php?id=${id}`;
        }
    }
    </script>
    
</body>
</html>
