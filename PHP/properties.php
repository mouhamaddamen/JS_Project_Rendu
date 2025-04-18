<?php
include './connexionBDD.php'; // Database configuration
session_start();

// Fetch all rental properties
$sql = "SELECT * FROM lots";
$stmt = $conn->query($sql);
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Management</title>
    <!-- Inclure d'abord common.css (si utilisé), puis header.css, puis property.css -->
    <link rel="stylesheet" href="../CSS/property.css">
    <script>
        // Confirm before deleting a property
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this property?")) {
                window.location.href = `delete_lot.php?id=${id}`;
            }
        }
    </script>

    <style>
        small {
            font-size: 0.8em;
            color: #666;
        }
    </style>
</head>
<body id="property-page">
    <?php include('header.php'); ?>
    
    <!-- Espace pour compenser le header fixe -->
    <div class="header-space"></div>
    
    <!-- Rental tabs: Active / Archived -->
    <div class="loc_choice">
        <div class="title">Rentals</div>
        <div class="buttons">
            <button class="active">Active ①</button>
            <button onclick="window.location.href='archives.php'">Archived ②</button>
        </div>
        <button class="new-location" onclick="window.location.href='nouveau_lot.php'">New Rental</button>
    </div>

    <!-- Rental properties table -->
    <div class="loc_tab">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property Name</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Rooms</th>
                    <th>Tenant</th>
                    <th>Rent</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($properties)): ?>
                    <!-- No properties found -->
                    <tr class="no-data">
                        <td colspan="10">
                            <p>Nothing here yet: this page is used to manage your rental properties.</p>
                            <p>If you own 5 properties rented to 5 different tenants, you'll need to create 5 rental contracts.</p>
                            <p>For each contract, rents and receipts are automatically generated under the Finance section.</p>
                            <button class="new-location" onclick="window.location.href='nouveau_lot.php'">Create New Rental</button>
                        </td>
                    </tr>
                <?php else: ?>
                    <!-- Display each rental property -->
                    <?php foreach ($properties as $property): ?>
                        <tr>
                            <td><?= htmlspecialchars($property['id']) ?></td>
                            <td>
                                <a href="gestion_bien.php?id=<?= $property['id'] ?>">
                                    <?= htmlspecialchars($property['identifiant'], ENT_QUOTES, 'UTF-8') ?>
                                </a>
                                <br>
                                <small>
                                    <?= htmlspecialchars($property['adresse'], ENT_QUOTES, 'UTF-8') ?><br>
                                    <?= htmlspecialchars($property['code_postal'], ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($property['ville'], ENT_QUOTES, 'UTF-8') ?>
                                </small>
                            </td>
                            <td><?= htmlspecialchars($property['type']) ?></td>
                            <td><?= htmlspecialchars($property['superficie']) ?> m²</td>
                            <td><?= htmlspecialchars($property['nb_pieces']) ?></td>
                            <td>
                                <?php if (empty($property['locataire'])): ?>
                                    <!-- If no tenant, show "New Tenant" button -->
                                    <button class="action-button" onclick="window.location.href='ajouter_locataire.php?lot_id=<?= $property['id'] ?>'">Add Tenant</button>
                                <?php else: ?>
                                    <!-- Show tenant's name -->
                                    <?= htmlspecialchars($property['locataire'], ENT_QUOTES, 'UTF-8') ?>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($property['loyer_hors_charge'] + $property['charges']) ?> €</td>
                            <td><?= htmlspecialchars($property['type_location']) ?></td>
                            <td>
                                <button class="action-button" onclick="window.location.href='modifier_lot.php?id=<?= $property['id'] ?>'">Edit</button>
                                <button class="action-button" onclick="confirmDelete(<?= $property['id'] ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include('footer.php'); ?>
    <?php include('contactbull.php'); ?>

</body>
</html>
