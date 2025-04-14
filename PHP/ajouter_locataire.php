<?php
include './connexionBDD.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lot_id = (int)$_POST['lot_id'];

    $data = [
        ':lot_id' => $lot_id,
        ':type_locataire' => htmlspecialchars($_POST['type_locataire']),
        ':civilite' => htmlspecialchars($_POST['civilite']),
        ':nom' => htmlspecialchars($_POST['nom']),
        ':prenom' => htmlspecialchars($_POST['prenom']),
        ':date_naissance' => $_POST['date_naissance'],
        ':ville_naissance' => htmlspecialchars($_POST['ville_naissance']),
        ':type_piece' => htmlspecialchars($_POST['type_piece']),
        ':numero_piece' => htmlspecialchars($_POST['numero_piece']),
        ':date_expiration' => $_POST['date_expiration'],
        ':situation_pro' => htmlspecialchars($_POST['situation_pro']),
        ':employeur' => htmlspecialchars($_POST['employeur']),
        ':revenus' => (float)$_POST['revenus'],
        ':email' => htmlspecialchars($_POST['email']),
        ':telephone' => htmlspecialchars($_POST['telephone']),
        ':adresse' => htmlspecialchars($_POST['adresse']),
        ':complement_adresse' => htmlspecialchars($_POST['complement_adresse']),
        ':code_postal' => htmlspecialchars($_POST['code_postal']),
        ':ville' => htmlspecialchars($_POST['ville'])
    ];

    if (empty($data[':nom']) || empty($data[':prenom'])) {
        die("First name and last name are required.");
    }

    try {
        $sql = "INSERT INTO locataires (
            lot_id, type_locataire, civilite, nom, prenom, date_naissance, ville_naissance,
            type_piece, numero_piece, date_expiration, situation_pro, employeur, revenus,
            email, telephone, adresse, complement_adresse, code_postal, ville
        ) VALUES (
            :lot_id, :type_locataire, :civilite, :nom, :prenom, :date_naissance, :ville_naissance,
            :type_piece, :numero_piece, :date_expiration, :situation_pro, :employeur, :revenus,
            :email, :telephone, :adresse, :complement_adresse, :code_postal, :ville
        )";

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);

        $full_name = $data[':prenom'] . ' ' . $data[':nom'];
        $stmt2 = $conn->prepare("UPDATE lots SET locataire = :locataire WHERE id = :lot_id");
        $stmt2->execute([
            ':locataire' => $full_name,
            ':lot_id' => $lot_id
        ]);

        header('Location: ../index.php?success=1');
        exit;

    } catch (PDOException $e) {
        die("Error while adding tenant: " . $e->getMessage());
    }

} else {
    $lot_id = (int)$_GET['lot_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Tenant</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
<?php include('header.php'); ?>

  <div class="max-w-5xl mx-auto mt-10 p-6 bg-white shadow rounded-lg">
    <h1 class="text-3xl font-bold text-green-700 mb-6"><i class="fas fa-user-plus mr-2"></i> Add Tenant</h1>

    <form method="POST">
      <input type="hidden" name="lot_id" value="<?= $lot_id ?>"/>

      <!-- Row 1 -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
          <label class="font-semibold">Type:</label>
          <select name="type_locataire" required class="w-full px-3 py-2 border rounded">
            <option value="">Select</option>
            <option value="Particulier">Individual</option>
            <option value="Société">Company</option>
            <option value="Association">Association</option>
          </select>
        </div>

        <div>
          <label class="font-semibold">Title:</label>
          <select name="civilite" required class="w-full px-3 py-2 border rounded">
            <option value="">Select</option>
            <option value="M.">Mr.</option>
            <option value="Mme">Mrs.</option>
            <option value="Mlle">Ms.</option>
          </select>
        </div>

        <div>
          <label class="font-semibold">Date of Birth:</label>
          <input type="date" name="date_naissance" class="w-full px-3 py-2 border rounded"/>
        </div>
      </div>

      <!-- Row 2 -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
          <label class="font-semibold">Last Name:</label>
          <input type="text" name="nom" required class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">First Name:</label>
          <input type="text" name="prenom" required class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Place of Birth:</label>
          <input type="text" name="ville_naissance" class="w-full px-3 py-2 border rounded"/>
        </div>
      </div>

      <!-- ID Document -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
          <label class="font-semibold">ID Type:</label>
          <select name="type_piece" class="w-full px-3 py-2 border rounded">
            <option value="">Select</option>
            <option value="CNI">ID Card</option>
            <option value="Passeport">Passport</option>
            <option value="Permis">Driver’s License</option>
          </select>
        </div>
        <div>
          <label class="font-semibold">Document Number:</label>
          <input type="text" name="numero_piece" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Expiration Date:</label>
          <input type="date" name="date_expiration" class="w-full px-3 py-2 border rounded"/>
        </div>
      </div>

      <!-- Employment -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div>
          <label class="font-semibold">Employment Status:</label>
          <select name="situation_pro" class="w-full px-3 py-2 border rounded">
            <option value="">Select</option>
            <option value="Salarié">Employee</option>
            <option value="Indépendant">Self-employed</option>
            <option value="Etudiant">Student</option>
            <option value="Retraité">Retired</option>
          </select>
        </div>
        <div>
          <label class="font-semibold">Employer:</label>
          <input type="text" name="employeur" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Monthly Income (€):</label>
          <input type="number" name="revenus" step="0.01" class="w-full px-3 py-2 border rounded"/>
        </div>
      </div>

      <!-- Contact -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
          <label class="font-semibold">Email:</label>
          <input type="email" name="email" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Phone:</label>
          <input type="tel" name="telephone" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Address:</label>
          <input type="text" name="adresse" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Address Line 2:</label>
          <input type="text" name="complement_adresse" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">Postal Code:</label>
          <input type="text" name="code_postal" class="w-full px-3 py-2 border rounded"/>
        </div>
        <div>
          <label class="font-semibold">City:</label>
          <input type="text" name="ville" class="w-full px-3 py-2 border rounded"/>
        </div>
      </div>

      <div class="text-right">
        <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
          <i class="fas fa-save mr-2"></i> Save
        </button>
      </div>
    </form>
  </div>
  <?php include('footer.php'); ?>
  <?php include('contactbull.php'); ?>

</body>
</html>
