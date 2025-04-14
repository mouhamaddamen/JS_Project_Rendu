<?php
include './connexionBDD.php'; // Configuration file inclusion
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Property</title>
    <link rel="stylesheet" href="../CSS/property.css">
    <style>
        .image-preview {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .image-preview img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>
    <div class="container">
        <h1>New Property</h1>

        <!-- Main form -->
        <form action="traitement_nouveau_lot.php" method="POST" enctype="multipart/form-data">
            <!-- General Information Section -->
            <div class="form-section">
                <h2>General Information</h2>
                <!-- Identifier Field -->
                <div class="form-group">
                    <label for="identifiant">Identifier:</label>
                    <input type="text" id="identifiant" name="identifiant" required>
                </div>

                <!-- Type Field -->
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select id="type" name="type" required>
                        <option value="">Select a type</option>
                        <option value="House">House</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Office">Office</option>
                        <option value="Commercial Space">Commercial Space</option>
                    </select>
                </div>
            </div>

            <!-- Address Section -->
            <div class="form-section">
                <h2>Address</h2>
                <!-- Address Field -->
                <div class="form-group">
                    <label for="adresse">Address:</label>
                    <input type="text" id="adresse" name="adresse" required>
                </div>

                <!-- Address 2 Field -->
                <div class="form-group">
                    <label for="adresse2">Address Line 2:</label>
                    <input type="text" id="adresse2" name="adresse2">
                </div>

                <!-- Building Field -->
                <div class="form-group">
                    <label for="batiment">Building:</label>
                    <input type="text" id="batiment" name="batiment">
                </div>

                <!-- Staircase Field -->
                <div class="form-group">
                    <label for="escalier">Staircase:</label>
                    <input type="text" id="escalier" name="escalier">
                </div>

                <!-- Floor Field -->
                <div class="form-group">
                    <label for="etage">Floor:</label>
                    <input type="text" id="etage" name="etage">
                </div>

                <!-- Number Field -->
                <div class="form-group">
                    <label for="numero">Number:</label>
                    <input type="text" id="numero" name="numero">
                </div>

                <!-- City Field -->
                <div class="form-group">
                    <label for="ville">City:</label>
                    <input type="text" id="ville" name="ville" required>
                </div>

                <!-- Postal Code Field -->
                <div class="form-group">
                    <label for="code_postal">Postal Code:</label>
                    <input type="text" id="code_postal" name="code_postal" required>
                </div>

                <!-- Region Field -->
                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" id="region" name="region" required>
                </div>
            </div>

            <!-- Rental Information Section -->
            <div class="form-section">
                <h2>Rental Information</h2>
                <!-- Rental Type Field -->
                <div class="form-group">
                    <label for="type_location">Rental Type:</label>
                    <select id="type_location" name="type_location" required>
                        <option value="">Select a type</option>
                        <option value="Furnished">Furnished</option>
                        <option value="Seasonal">Seasonal</option>
                        <option value="Unfurnished">Unfurnished</option>
                    </select>
                </div>

                <!-- Base Rent Field -->
                <div class="form-group">
                    <label for="loyer_hors_charge">Base Rent (€):</label>
                    <input type="number" id="loyer_hors_charge" name="loyer_hors_charge" step="0.01" required>
                </div>

                <!-- Charges Field -->
                <div class="form-group">
                    <label for="charges">Additional Charges (€):</label>
                    <input type="number" id="charges" name="charges" step="0.01" required>
                </div>

                <!-- Payment Frequency Field -->
                <div class="form-group">
                    <label for="frequence_paiement">Payment Frequency:</label>
                    <select id="frequence_paiement" name="frequence_paiement" required>
                        <option value="">Select frequency</option>
                        <option value="Yearly">Yearly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                    </select>
                </div>
            </div>

            <!-- Description Section -->
            <div class="form-section">
                <h2>Description</h2>

                <!-- Area -->
                <div class="form-group">
                    <label for="superficie">Area (m²):</label>
                    <input type="number" id="superficie" name="superficie" step="0.1" required>
                </div>

                <!-- Number of rooms -->
                <div class="form-group">
                    <label for="nb_pieces">Total Rooms:</label>
                    <input type="number" id="nb_pieces" name="nb_pieces" required>
                </div>

                <!-- Number of bedrooms -->
                <div class="form-group">
                    <label for="nb_chambres">Bedrooms:</label>
                    <input type="number" id="nb_chambres" name="nb_chambres" required>
                </div>

                <!-- Number of bathrooms -->
                <div class="form-group">
                    <label for="salles_de_bain">Bathrooms:</label>
                    <input type="number" id="salles_de_bain" name="salles_de_bain" required>
                </div>

                <!-- Construction date -->
                <div class="form-group">
                    <label for="date_construction">Construction Date:</label>
                    <input type="date" id="date_construction" name="date_construction" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
            </div>

            <!-- Submit button -->
            <div class="form-group">
                <button type="submit">Create Property</button>
            </div>
        </form>
    </div>
    <?php include('footer.php'); ?>
    <?php include('contactbull.php'); ?>

</body>
</html>