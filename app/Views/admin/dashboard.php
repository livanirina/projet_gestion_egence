<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Admin</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Bienvenue, <?= $username ?></h2>
        <a href="<?= site_url('espaceAdmin/logout') ?>" class="btn btn-danger mb-4">Déconnexion</a>


        <h3>Gestion des Agences</h3>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAgencyModal">Ajouter une Agence</button>
        <table id="agenciesTable" class="display">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agencies as $agency): ?>
                    <tr>
                        <td><?= $agency['name'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editAgencyModal<?= $agency['id'] ?>">Modifier</button>
                            <a href="<?= site_url('espaceAdmin/deleteAgency/' . $agency['id']) ?>" 
                               class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>

                <!-- Modal pour modifier l'agence -->
                <div class="modal fade" id="editAgencyModal<?= $agency['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="<?= site_url('espaceAdmin/editAgency/' . $agency['id']) ?>" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier l'Agence</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Nom de l'agence -->
                                    <div class="mb-3">
                                        <label for="agency_name" class="form-label">Nom de l'agence</label>
                                        <input type="text" name="name" class="form-control" value="<?= $agency['name'] ?>" required>
                                    </div>
                                    <!-- Description de l'agence -->
                                    <div class="mb-3">
                                        <label for="agency_description" class="form-label">Description de l'agence</label>
                                        <textarea name="description" class="form-control" id="agency_description" rows="3"><?= $agency['description'] ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Modal pour ajouter une agence -->
<div class="modal fade" id="addAgencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('espaceAdmin/addAgency') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une Agence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nom de l'agence -->
                    <div class="mb-3">
                        <label for="agency_name" class="form-label">Nom de l'agence</label>
                        <input type="text" name="name" class="form-control" id="agency_name" placeholder="Nom de l'agence" required>
                    </div>

                    <!-- Description de l'agence -->
                    <div class="mb-3">
                        <label for="agency_description" class="form-label">Description de l'agence</label>
                        <textarea name="description" class="form-control" id="agency_description" rows="3" placeholder="Description de l'agence" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>


        <h3 class="mt-5">Gestion des Services</h3>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal">Ajouter un Service</button>
        <table id="servicesTable" class="display">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Agence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $service['name'] ?></td>
                        <td><?= $service['agency_id'] ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editServiceModal<?= $service['id'] ?>">Modifier</button>
                            <a href="<?= site_url('espaceAdmin/deleteService/' . $service['id']) ?>" 
                               class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="editServiceModal<?= $service['id'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('espaceAdmin/editService/' . $service['id']) ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du service</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= $service['name'] ?>" required>
                    </div>

                    <!-- Description du service -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du service</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required><?= $service['description'] ?></textarea>
                    </div>

                    <!-- Prix du service -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix du service</label>
                        <input type="number" name="price" class="form-control" id="price" value="<?= $service['price'] ?>" required>
                    </div>

                    <!-- Nombre d'étoiles -->
                    <div class="mb-3">
                        <label for="stars" class="form-label">Étoiles (note)</label>
                        <input type="number" name="stars" class="form-control" id="stars" min="1" max="5" value="<?= $service['stars'] ?>" required>
                    </div>

                    <!-- Type de service -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type de service</label>
                        <select name="type" class="form-control" id="type" required>
                            <option value="circuit" <?= $service['type'] == 'circuit' ? 'selected' : '' ?>>Circuit</option>
                            <option value="hotel" <?= $service['type'] == 'hotel' ? 'selected' : '' ?>>Hôtel</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('espaceAdmin/addService') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sélectionner l'agence -->
                    <div class="mb-3">
                        <label for="agency_id" class="form-label">Sélectionner une agence</label>
                        <select name="agency_id" class="form-control" id="agency_id" required>
                            <?php foreach ($agencies as $agency): ?>
                                <option value="<?= $agency['id'] ?>"><?= $agency['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Nom du service -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du service</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nom du service" required>
                    </div>

                    <!-- Description du service -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du service</label>
                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description du service" required></textarea>
                    </div>

                    <!-- Prix du service -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix du service</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Prix du service" required>
                    </div>

                    <!-- Nombre d'étoiles -->
                    <div class="mb-3">
                        <label for="stars" class="form-label">Étoiles (note)</label>
                        <input type="number" name="stars" class="form-control" id="stars" min="1" max="5" placeholder="Étoiles (1 à 5)" required>
                    </div>

                    <!-- Type de service -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type de service</label>
                        <select name="type" class="form-control" id="type" required>
                            <option value="circuit">Circuit</option>
                            <option value="hotel">Hôtel</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <!-- Reservations Section -->
        <h3 class="mt-5">Liste des Réservations</h3>
        <table id="reservationsTable" class="display">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= $reservation['client_name'] ?></td>
                        <td><?= $reservation['service_id'] ?></td>
                        <td><?= $reservation['reservation_date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#agenciesTable').DataTable();
            $('#servicesTable').DataTable();
            $('#reservationsTable').DataTable();
        });
    </script>
</body>
</html>
