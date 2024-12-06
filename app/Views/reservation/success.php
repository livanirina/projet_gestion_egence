<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture de Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Votre Facture</h2>
        <div class="alert alert-info mt-4">
            <p>Voici votre facture de réservation :</p>
            <div class="border p-3 bg-light">
                <?= $invoice; ?>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="<?= $invoicePath ?>" class="btn btn-primary" download>Télécharger la facture</a>
            <a href="/" class="btn btn-secondary">Retour à l'accueil</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
