<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Ideas</title>
    <link rel="stylesheet" href="../CSS/investissements.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include('header.php'); ?>
    <section class="investment-intro">
        <div class="intro-content animate-on-scroll">
            <div class="intro-image">
                <img src="../img/investissements/investment-intro.jpg" alt="Investment Overview">
            </div>
            <div class="intro-text">
                <h4>INVESTMENT IDEAS</h4>
                <p>
                    Unlock the potential of your investments with our Investment Ideas page. Explore a variety of options including houses, apartments, villas or parking spaces. Our user-friendly interface allows you to easily navigate through different opportunities, ensuring you make informed decisions. Whether you're a seasoned investor or just starting out, we provide the tools and insights you need to maximize your returns. Start your journey to successful real estate investment today!
                </p>
            </div>
        </div>
    </section>

    <section class="investment-section">
        <!-- Maison -->
        <div class="investment-item animate-on-scroll">
            <div class="investment-image">
                <img src="../img/investissements/house.png" alt="House">
            </div>
            <div class="investment-description">
                <span class="investment-label">Featured Opportunity</span>
                <h3>House</h3>
                <p>
                A modern townhouse is a smart and secure investment in today’s competitive real estate market. Located in well-connected suburban or urban neighborhoods, it offers the perfect balance between comfort, space, and affordability. Townhouses appeal to families, young professionals, and first-time buyers due to their practicality and strong resale potential. With lower maintenance costs compared to detached homes and consistent rental demand, this type of property generates reliable income while building long-term equity. A practical and profitable choice for any investor.                </p>
            </div>
        </div>

        <!-- Appartement -->
        <div class="investment-item reverse animate-on-scroll reverse">
            <div class="investment-image">
                <img src="../img/investissements/apartment.jpg" alt="City Apartment">
            </div>
            <div class="investment-description">
                <h3>City Apartment</h3>
                <p>
                  City apartments are one of the most reliable sources of rental income. Perfectly located near business hubs, transportation, and local amenities, they attract professionals, students, and tourists alike. High demand and low vacancy rates make them a smart choice for any investor. Whether for short-term rental or long-term leasing, a city apartment offers strong returns and excellent liquidity on resale.
                </p>
            </div>
        </div>

        <!-- Villa -->
        <div class="investment-item animate-on-scroll">
            <div class="investment-image">
                <img src="../img/investissements/villa.jpg" alt="Mediterranean Villa">
            </div>
            <div class="investment-description">
                <h3>Mediterranean Villa</h3>
                <p>
                  A Mediterranean villa combines lifestyle and profitability like no other property. Located in some of the most desirable coastal areas, these villas appeal to vacationers and luxury buyers alike. Their timeless architecture, sea views, and tranquil surroundings make them highly sought after. Ideal for high-income holiday rentals or as a secondary residence with strong resale potential, it’s the perfect blend of pleasure and investment.
                </p>
            </div>
        </div>

        <!-- Parking -->
        <div class="investment-item reverse animate-on-scroll reverse">
            <div class="investment-image">
                <img src="../img/investissements/parking.jpg" alt="Parking Spot">
            </div>
            <div class="investment-description">
                <h3>Parking Spot</h3>
                <p>
                  A parking spot is the simplest and smartest way to start in real estate. Low-cost, low-maintenance, and in constant demand—especially in urban areas—parking spaces offer surprisingly high returns. With virtually no tenant management and minimal fees, they provide a passive income stream with limited risk. A great entry-level investment, or a solid addition to any real estate portfolio.
                </p>
            </div>
        </div>
        <?php include('footer.php'); ?>
        <?php include('contactbull.php'); ?>

    </section>
    <script src="../JS/investissements.js"></script>
</body>
</html>
