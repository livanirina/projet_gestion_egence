<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Services</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">NGOMA DAGO TRAVEL</a>
        </div>
    </nav>
<div class="container mt-4">
    <h1>Services</h1>
    <ul class="list-group">
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
    </ul>
</div>
</body>
</html>
