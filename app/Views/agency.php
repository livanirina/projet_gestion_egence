<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Services</title>
</head>
<style>
     body {
            background: linear-gradient(to right, #ff7e5f, #feb47b, #6a11cb, #2575fc, #2ab7ca);
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Style pour la liste et ses éléments */
.list-group-item {
    background-color: rgba(255, 255, 255, 0.8); /* Fond transparent avec opacité */
    border: 1px solid rgba(0, 0, 0, 0.1); /* Bordure légère */
    border-radius: 10px;
    margin-bottom: 10px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

/* Effet de survol pour les éléments de la liste */
.list-group-item:hover {
    background-color: rgba(255, 255, 255, 1); /* Augmenter l'opacité au survol */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Ajout d'une ombre */
}

/* Input des formulaires transparent */
.form-control {
    background-color: rgba(255, 255, 255, 0.6); /* Fond transparent pour les champs */
    border: 1px solid rgba(0, 0, 0, 0.1); /* Bordure légère */
}

/* Effet de survol sur les champs de saisie */
.form-control:focus {
    background-color: rgba(255, 255, 255, 1); /* Plus opaque quand on clique dessus */
    border-color: #007bff; /* Couleur de la bordure au focus */
}

/* Bouton transparent avec effet */
.btn-primary {
    background-color: rgba(0, 123, 255, 0.8); /* Fond transparent pour le bouton */
    border: 1px solid rgba(0, 123, 255, 0.8);
}

.btn-primary:hover {
    background-color: rgba(0, 123, 255, 1); /* Plus opaque au survol */
}

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">NGOMA DAGO TRAVEL</a>
    </div>
</nav>

<div class="container mt-4">
    <h1>Services</h1>

    <!-- Barre de recherche et tri -->
    <form method="get" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un service" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
            </div>
            <div class="col-md-4">
                <select name="sort_by" class="form-control">
                    <option value="">Trier par</option>
                    <option value="alphabetical" <?= isset($_GET['sort_by']) && $_GET['sort_by'] === 'alphabetical' ? 'selected' : '' ?>>Nom (A-Z)</option>
                    <option value="price" <?= isset($_GET['sort_by']) && $_GET['sort_by'] === 'price' ? 'selected' : '' ?>>Prix croissant</option>
                    <option value="stars" <?= isset($_GET['sort_by']) && $_GET['sort_by'] === 'stars' ? 'selected' : '' ?>>Étoiles</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
        </div>
    </form>

    <ul class="list-group">
        <?php if (!empty($services)): ?>
            <?php foreach ($services as $service): ?>
                <li class="list-group-item">
                    <h5><?= $service['name'] ?> (<?= ucfirst($service['type']) ?>)</h5>
                    <p><?= $service['description'] ?></p>
                    <p>Prix: <?= $service['price'] ?> Ariary</p>
                    <form method="post" action="<?= site_url('reservation/create') ?>">
                        <input type="hidden" name="service_id" value="<?= $service['id'] ?>">
                        <input type="text" name="name" placeholder="Nom" class="form-control mb-2" required>
                        <input type="text" name="phone" placeholder="Téléphone" class="form-control mb-2" required>
                        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                        <input type="date" name="date" class="form-control mb-2" required>
                        <button type="submit" class="btn btn-primary">Réserver</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">Aucun service trouvé.</li>
        <?php endif; ?>
    </ul>
</div>

<footer class="bg-light mt-5 py-3">
    <div class="container">
        <p class="text-center mb-0">&copy; 2024 NGOMA DAGO TRAVEL. Tous droits réservés.</p>
        <p class="text-center mb-0">Contact : lobokely@gmail.com | Tél : +261 34 73 152 17</p>
    </div>
</footer>
</body>
</html>
