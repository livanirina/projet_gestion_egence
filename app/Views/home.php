<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGOMA DAGO TRAVEL - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Arrière-plan dégradé à 5 couleurs */
        body {
            background: linear-gradient(to right, #ff7e5f, #feb47b, #6a11cb, #2575fc, #2ab7ca);
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Style de la barre de navigation */
        nav {
            background-color: rgba(0, 0, 0, 0.7); /* Barre de navigation semi-transparente */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Conteneur principal */
        .container {
            margin-top: 30px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
        }

        /* Style de la barre de recherche */
        .form-control {
            border-radius: 50px;
            padding: 15px;
            font-size: 1.1rem;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Style des cartes transparentes */
.card {
    background-color: rgba(255, 255, 255, 0.8); /* Fond semi-transparent */
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Effet de survol */
.card:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

/* Style de la carte lorsque l'on survole */
.card-body {
    background-color: rgba(255, 255, 255, 0.9); /* Fond légèrement opaque */
    padding: 20px;
}

/* Titre de la carte */
.card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

/* Description de la carte */
.card-description {
    display: none;
    font-size: 0.9rem;
    color: #555;
    padding-top: 10px;
}

.card:hover .card-description {
    display: block;
}

/* Bouton de la carte */
.card-body a {
    font-size: 1.1rem;
    color: #fff;
    background-color: #007bff;
    padding: 10px 20px;
    border-radius: 50px;
    text-decoration: none;
}

.card-body a:hover {
    background-color: #0056b3;
}

        /* Footer */
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            margin-top: 50px;
        }

        footer p {
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">NGOMA DAGO TRAVEL</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Agences</h1>

        <!-- Barre de recherche -->
        <form method="get" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher une agence" 
                           value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php if (!empty($agencies)): ?>
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
            <?php else: ?>
                <p class="text-center">Aucune agence trouvée.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="bg-dark mt-5 py-3">
        <div class="container">
            <p class="text-center mb-0">&copy; 2024 NGOMA DAGO TRAVEL. Tous droits réservés.</p>
            <p class="text-center mb-0">Contact : lobokely@gmail.com | Tél : +261 34 73 152 17</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
