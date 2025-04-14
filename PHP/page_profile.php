<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Propriétaire - Gestion Immobilière</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
</head>
<body class="fade-in py-8 px-4">
<?php include('header.php'); ?>
  <div class="max-w-6xl mx-auto">
    <div class="profile-card mb-10 shadow-xl p-8">
      <div class="flex flex-col md:flex-row justify-between items-center mb-10">
        <div class="slide-up">
          <h1 class="text-4xl font-bold mb-2">Profil Propriétaire</h1>
          <p class="text-gray-600">Gérez vos biens et suivez vos performances</p>
        </div>
        <div class="flex items-center space-x-3 mt-5 md:mt-0">
          <div class="tooltip">
            <span class="px-4 py-2 rounded-full property-badge text-sm font-medium flex items-center">
              <i class="fas fa-building mr-2"></i> 3 biens
              <span class="tooltip-text">Total des biens</span>
            </span>
          </div>
          <div class="tooltip">
            <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-800 text-sm font-medium flex items-center">
              <i class="fas fa-calendar-alt mr-2"></i> Membre depuis 06/05/2023
              <span class="tooltip-text">Date d'inscription</span>
            </span>
          </div>
        </div>
      </div>

      <div class="flex flex-col lg:flex-row gap-8 mb-12">
        <!-- Photo et informations personnelles -->
        <div class="w-full lg:w-1/3 flex flex-col items-center lg:items-start">
          <div class="profile-image-container mb-6 mx-auto">
            <img id="profile-img" class="profile-image" 
                 src="https://ui-avatars.com/api/?name=Mohamed+Alouache&background=B57948&color=fff&size=200" 
                 alt="Photo de profil">
            <label for="upload-photo" class="camera-btn">
              <i class="fas fa-camera"></i>
            </label>
            <input type="file" id="upload-photo" accept="image/*" class="hidden">
          </div>
          
          <div class="bg-white rounded-2xl shadow-lg p-6 w-full">
            <h2 class="text-xl font-bold text-primary mb-5 section-title">Informations personnelles</h2>
            <ul class="info-list space-y-4">
              <li>
                <div class="info-label"><i class="fas fa-user"></i> Nom complet</div>
                <div class="info-value">Mohamed Alouache</div>
              </li>
              <li>
                <div class="info-label"><i class="fas fa-phone"></i> Téléphone</div>
                <div class="info-value">0568949345</div>
              </li>
              <li>
                <div class="info-label"><i class="fas fa-envelope"></i> Email</div>
                <div class="info-value">alouache@hotmail.fr</div>
              </li>
              <li>
                <div class="info-label"><i class="fas fa-id-card"></i> Identifiant</div>
                <div class="info-value">#ALO2023</div>
              </li>
            </ul>
            <button class="btn-secondary w-full mt-6 py-3 rounded-xl font-medium">
              <i class="fas fa-pen mr-2"></i> Modifier mes informations
            </button>
          </div>
        </div>
        
        <!-- Dashboard de droite -->
        <div class="w-full lg:w-2/3">
          <!-- Carte d'abonnement -->
          <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 relative overflow-hidden">
            <span class="premium-badge">
              <i class="fas fa-crown mr-1"></i> Premium
            </span>
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-xl font-bold text-primary section-title">Statut d'abonnement</h2>
              <div class="relative">
                <button class="text-gray-600 hover:text-primary">
                  <i class="fas fa-bell text-xl"></i>
                </button>
                <span class="notification-badge">3</span>
              </div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6">
              <div class="subscription-status w-full md:w-1/2">
                <div class="flex justify-between items-center mb-4">
                  <span class="font-medium text-gray-700">État actuel:</span>
                  <span class="status-badge status-badge-danger">
                    <i class="fas fa-exclamation-circle mr-1"></i> Non payé
                  </span>
                </div>
                <div class="space-y-3 text-sm">
                  <div class="flex justify-between">
                    <span class="text-gray-600">Dernier paiement:</span>
                    <span class="font-medium">17/05/2024</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Montant dû:</span>
                    <span class="font-medium">3000 DZD</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Date d'échéance:</span>
                    <span class="font-medium text-red-600">17/06/2024</span>
                  </div>
                  <div class="flex justify-between">
                    <span class="text-gray-600">Formule:</span>
                    <span class="font-medium">Premium Annuel</span>
                  </div>
                </div>
                <button class="btn-primary w-full mt-5 py-3 rounded-xl font-medium pulse">
                  <i class="fas fa-credit-card mr-2"></i> Payer l'abonnement
                </button>
              </div>
              
              <div class="w-full md:w-1/2">
                <h3 class="font-bold mb-4 text-gray-700">Avantages Premium</h3>
                <ul class="space-y-3">
                  <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Visibilité maximale de vos biens</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Statistiques détaillées des visites</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Génération de contrats automatique</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Support prioritaire 7j/7</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                    <span>Jusqu'à 10 biens immobiliers</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <!-- Statistiques -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="stats-card">
              <div class="flex items-center justify-between mb-2">
                <span class="stats-value">2</span>
                <i class="fas fa-home text-2xl text-primary-light opacity-50"></i>
              </div>
              <span class="stats-label">Biens loués</span>
            </div>
            
            <div class="stats-card">
              <div class="flex items-center justify-between mb-2">
                <span class="stats-value">1</span>
                <i class="fas fa-door-open text-2xl text-primary-light opacity-50"></i>
              </div>
              <span class="stats-label">Biens vacants</span>
            </div>
            
            <div class="stats-card">
              <div class="flex items-center justify-between mb-2">
                <span class="stats-value">3700€</span>
                <i class="fas fa-euro-sign text-2xl text-primary-light opacity-50"></i>
              </div>
              <span class="stats-label">Revenu mensuel</span>
            </div>
            
            <div class="stats-card">
              <div class="flex items-center justify-between mb-2">
                <span class="stats-value">95%</span>
                <i class="fas fa-chart-pie text-2xl text-primary-light opacity-50"></i>
              </div>
              <span class="stats-label">Taux d'occupation</span>
            </div>
          </div>
          
          <!-- Graphique de performance (placeholder) -->
          <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-primary mb-5 section-title">Performance mensuelle</h2>
            <div class="h-60 bg-gray-50 rounded-lg flex items-center justify-center">
              <div class="text-center">
                <i class="fas fa-chart-line text-4xl text-gray-300 mb-2"></i>
                <p class="text-gray-500">Graphique des revenus et dépenses</p>
                <button class="mt-3 text-primary hover:text-secondary font-medium">
                  <i class="fas fa-eye mr-1"></i> Voir les détails
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section des biens immobiliers -->
      <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-primary section-title">Mes biens immobiliers</h2>
          <div class="flex space-x-2">
            <button class="text-gray-600 hover:text-primary px-3 py-2 rounded-lg border border-gray-200 hover:border-primary">
              <i class="fas fa-sort-amount-down mr-1"></i> Trier
            </button>
            <button class="text-gray-600 hover:text-primary px-3 py-2 rounded-lg border border-gray-200 hover:border-primary">
              <i class="fas fa-filter mr-1"></i> Filtrer
            </button>
          </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
          <!-- Bien 1 -->
          <div class="property-card">
            <div class="image-container h-48">
              <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                   alt="Appartement" class="w-full h-full object-cover">
              <span class="property-badge">
                <i class="fas fa-building mr-1"></i> Appartement
              </span>
              <span class="property-price">
                1200€/mois
              </span>
            </div>
            <div class="p-5">
              <div class="flex justify-between items-start mb-2">
                <h3 class="font-bold text-lg text-gray-800">Résidence Les Cèdres</h3>
                <span class="status-badge status-badge-success text-xs">Loué</span>
              </div>
              <p class="text-gray-600 mb-3 flex items-center">
                <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i> 123 Rue de Paris, 75000 Paris
              </p>
              <div class="grid grid-cols-3 gap-2 mb-4 text-sm">
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-ruler-combined text-primary mb-1"></i>
                  <span>80 m²</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-bed text-primary mb-1"></i>
                  <span>3 pièces</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-calendar-check text-primary mb-1"></i>
                  <span>01/05/2024</span>
                </div>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">
                  <i class="fas fa-user-check text-green-500 mr-1"></i> Locataire: Jean Dupont
                </span>
                <button class="text-primary hover:text-secondary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Bien 2 -->
          <div class="property-card">
            <div class="image-container h-48">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                   alt="Maison" class="w-full h-full object-cover">
              <span class="property-badge">
                <i class="fas fa-home mr-1"></i> Maison
              </span>
              <span class="property-price">
                2500€/mois
              </span>
            </div>
            <div class="p-5">
              <div class="flex justify-between items-start mb-2">
                <h3 class="font-bold text-lg text-gray-800">Villa des Roses</h3>
                <span class="status-badge status-badge-success text-xs">Loué</span>
              </div>
              <p class="text-gray-600 mb-3 flex items-center">
                <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i> 45 Avenue Victor Hugo, 06000 Nice
              </p>
              <div class="grid grid-cols-3 gap-2 mb-4 text-sm">
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-ruler-combined text-primary mb-1"></i>
                  <span>150 m²</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-bed text-primary mb-1"></i>
                  <span>5 pièces</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-calendar-check text-primary mb-1"></i>
                  <span>15/03/2024</span>
                </div>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">
                  <i class="fas fa-user-check text-green-500 mr-1"></i> Locataire: Marie Martin
                </span>
                <button class="text-primary hover:text-secondary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Bien 3 -->
          <div class="property-card">
            <div class="image-container h-48">
              <img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" 
                   alt="Studio" class="w-full h-full object-cover">
              <span class="property-badge">
                <i class="fas fa-building mr-1"></i> Studio
              </span>
              <span class="property-price">
                850€/mois
              </span>
            </div>
            <div class="p-5">
              <div class="flex justify-between items-start mb-2">
                <h3 class="font-bold text-lg text-gray-800">Studio Bellevue</h3>
                <span class="status-badge status-badge-danger text-xs">Vacant</span>
              </div>
              <p class="text-gray-600 mb-3 flex items-center">
                <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i> 8 Rue des Lilas, 69000 Lyon
              </p>
              <div class="grid grid-cols-3 gap-2 mb-4 text-sm">
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-ruler-combined text-primary mb-1"></i>
                  <span>35 m²</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-bed text-primary mb-1"></i>
                  <span>1 pièce</span>
                </div>
                <div class="flex flex-col items-center p-2 bg-gray-50 rounded-lg">
                  <i class="fas fa-calendar-times text-primary mb-1"></i>
                  <span>Disponible</span>
                </div>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-sm text-red-500">
                  <i class="fas fa-exclamation-circle mr-1"></i> Depuis 45 jours
                </span>
                <button class="text-primary hover:text-secondary">
                  <i class="fas fa-edit"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-8">
          <button class="btn-primary add-property-btn px-6 py-3 rounded-xl font-medium">
            <i class="fas fa-plus-circle text-lg mr-2"></i> Ajouter un nouveau bien
          </button>
        </div>
      </div>

      <!-- Section des documents et contrats -->
      <div class="mb-12">
        <h2 class="text-2xl font-bold text-primary mb-6 section-title">Documents et contrats</h2>
        
        <div class="bg-white rounded-2xl shadow-lg p-6">
          <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
              <i class="fas fa-file-contract text-2xl text-primary mr-3"></i>
              <div>
                <h3 class="font-bold">Documents récents</h3>
                <p class="text-sm text-gray-500">Accédez à tous vos documents importants</p>
              </div>
            </div>
            <button class="text-primary hover:text-secondary">
              <i class="fas fa-cloud-upload-alt mr-1"></i> Importer
            </button>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
              <thead class="bg-gray-100">
                <tr>
                  <th class="py-3 px-4 text-left">Nom du document</th>
                  <th class="py-3 px-4 text-left">Bien concerné</th>
                  <th class="py-3 px-4 text-left">Date d'ajout</th>
                  <th class="py-3 px-4 text-left">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                  <td class="py-3 px-4">
                    <div class="flex items-center">
                      <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                      <span>Contrat_Location_LesCedres.pdf</span>
                    </div>
                  </td>
                  <td class="py-3 px-4">Résidence Les Cèdres</td>
                  <td class="py-3 px-4">01/05/2024</td>
                  <td class="py-3 px-4">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-download"></i>
                      </button>
                      <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="py-3 px-4">
                    <div class="flex items-center">
                      <i class="fas fa-file-pdf text-red-500 mr-2"></i>
                      <span>Assurance_Villa_Roses.pdf</span>
                    </div>
                  </td>
                  <td class="py-3 px-4">Villa des Roses</td>
                  <td class="py-3 px-4">15/03/2024</td>
                  <td class="py-3 px-4">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-download"></i>
                      </button>
                      <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="py-3 px-4">
                    <div class="flex items-center">
                      <i class="fas fa-file-image text-blue-500 mr-2"></i>
                      <span>Photos_Etat_Lieux_Studio.jpg</span>
                    </div>
                  </td>
                  <td class="py-3 px-4">Studio Bellevue</td>
                  <td class="py-3 px-4">10/04/2024</td>
                  <td class="py-3 px-4">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-download"></i>
                      </button>
                      <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div class="mt-4 text-right">
            <button class="text-primary hover:text-secondary font-medium">
              Voir tous les documents <i class="fas fa-arrow-right ml-1"></i>
            </button>
          </div>
        </div>
      </div>
      
      <!-- Pied de page -->
      <div class="flex flex-col md:flex-row justify-between items-center border-t border-gray-200 pt-6 text-gray-600">
        <div class="mb-4 md:mb-0">
          <p>© 2024 Gestion Immobilière. Tous droits réservés.</p>
        </div>
        <div class="flex space-x-4">
          <a href="#" class="hover:text-primary transition"><i class="fas fa-question-circle mr-1"></i> Aide</a>
          <a href="#" class="hover:text-primary transition"><i class="fas fa-cog mr-1"></i> Paramètres</a>
          <a href="../index.php?logout=true" class="hover:text-primary transition"><i class="fas fa-sign-out-alt mr-1"></i> Déconnexion</a>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  <?php include('contactbull.php'); ?>

  <script>
    // Gestion de l'upload de photo
    document.getElementById('upload-photo').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file && file.type.match('image.*')) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const img = document.getElementById('profile-img');
          img.classList.add('animate-pulse');
          
          setTimeout(() => {
            img.src = e.target.result;
            img.classList.remove('animate-pulse');
            
            // Animation de confirmation
            const container = document.querySelector('.profile-image-container');
            container.classList.add('pulse');
            setTimeout(() => {
              container.classList.remove('pulse');
            }, 2000);
          }, 500);
        };
        reader.readAsDataURL(file);
      } else {
        alert('Veuillez sélectionner une image valide (JPEG, PNG)');
      }
    });

    // Animation des cartes au scroll
    const animateOnScroll = () => {
      const cards = document.querySelectorAll('.property-card, .stats-card');
      cards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;
        const cardBottom = card.getBoundingClientRect().bottom;
        const windowHeight = window.innerHeight;
        
        if (cardTop < windowHeight - 100 && cardBottom > 0) {
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }
      });
    };

    // Initialiser les cartes avec une opacité de 0 et une translation
    document.querySelectorAll('.property-card, .stats-card').forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(20px)';
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    // Ajouter l'événement de scroll
    window.addEventListener('scroll', animateOnScroll);
    
    // Appel initial pour animer les éléments visibles au chargement
    setTimeout(animateOnScroll, 300);
  </script>
</body>
</html>