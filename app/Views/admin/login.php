<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6f42c1, #e83e8c);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
            padding: 30px;
            background-color: rgba(0, 0, 0, 0.7); /* Fond sombre et transparent */
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-label {
            font-size: 1rem;
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            background-color: #fff;
            color: #333;
            border-color: #6f42c1;
            box-shadow: 0 0 10px rgba(111, 66, 193, 0.5);
        }

        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a31a1;
            border-color: #5a31a1;
        }

        .alert {
            margin-bottom: 20px;
        }

        footer {
            background-color: #212529;
            color: #fff;
            padding: 10px 0;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: #e83e8c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Espace Administrateur</h2>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('espaceAdmin/authenticate') ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>

    <footer class="mt-5">
        <div class="container text-center">
            <p>&copy; 2024 NGOMA DAGO TRAVEL. Tous droits réservés.</p>
            <p>Contact : lobokely@gmail.com | Tél : +261 34 73 152 17</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
