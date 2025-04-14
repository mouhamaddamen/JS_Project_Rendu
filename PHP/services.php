<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Dashboard</title>
    <link rel="stylesheet" href="./CSS/services.css">
</head>
<body>
    <section class="container">
        <h1 class="title">All of our services</h1>
        
        <div id="services" class="card-container">
            <a href="./PHP/nouveau_lot.php" class="card">
                <img src="./img/investissements/house1.jpg" alt="Investment Tracking">
                <div class="card-content">
                    <h3>Add a property &rarr;</h3>
                    <p>Easily add new real estate assets to your portfolio and manage them efficiently.</p>
                </div>
            </a>
            <a href="./PHP/properties.php" class="card">
                <img src="./img/investissements/house2.jpg" alt="Profitability Analysis">
                <div class="card-content">
                    <h3>My Properties &rarr;</h3>
                    <p>Keep track of all your real estate investments in one place.</p>
                </div>
            </a>
            <a href="./PHP/investments.php" style = "text-decoration: none" class="card">
                <img src="./img/investissements/house3.jpg" alt="Investment Ideas">
                <div class="card-content">
                    <h3>Investment Ideas &rarr;</h3>
                    <p>Discover new and profitable real estate opportunities.</p>
                </div>
            </a>
        </div>
    </section>
    <script src="./JS/investissements.js"></script>
</body>
</html>