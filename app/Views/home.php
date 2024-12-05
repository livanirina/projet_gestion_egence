<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGOMA DAGO TRAVEL - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style pour les cartes */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden; /* Pour masquer la description quand elle n'est pas affichée */
        }

        /* Effet de survol */
        .card:hover {
            transform: scale(1.05); /* Agrandir la carte */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Ajouter une ombre pour l'effet */
        }

        /* Description cachée par défaut */
        .card-description {
            display: none;
            padding-top: 10px;
            font-size: 0.9rem;
        }

        /* Affichage de la description quand la carte est survolée */
        .card:hover .card-description {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">NGOMA DAGO TRAVEL</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Agences</h1>
        <div class="row">
            <?php foreach ($agencies as $agency): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $agency['name'] ?></h5>
                            <p class="card-description"><?= $agency['description'] ?></p>
                            <a href="<?= site_url('home/agency/' . $agency['id']) ?>" class="btn btn-primary">Voir l'agence</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="bg-light mt-5 py-3">
        <div class="container">
            <p class="text-center mb-0">&copy; 2024 NGOMA DAGO TRAVEL. Tous droits réservés.</p>
            <p class="text-center mb-0">Contact : lobokely@gmail.com | Tél : +261 34 73 152 17</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
