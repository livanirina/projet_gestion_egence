<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Réservation Confirmée</h2>
        <div class="alert alert-success">
            <p>Votre réservation a été confirmée. Voici votre facture :</p>
            <pre><?php echo $invoice; ?></pre> <!-- Affichage de la facture à l'écran -->

            <a href="<?= base_url('invoices/' . basename($invoicePath)) ?>" class="btn btn-primary" download>Télécharger la facture</a> <!-- Lien pour télécharger la facture -->
        </div>
    </div>
    <footer class="bg-light mt-5 py-3">
        <div class="container">
            <p class="text-center mb-0">&copy; 2024 NGOMA DAGO TRAVEL. Tous droits réservés.</p>
            <p class="text-center mb-0">Contact : lobokely@gmail.com | Tél : +261 34 73 152 17</p>
        </div>
    </footer>
    <!-- Scripts JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
