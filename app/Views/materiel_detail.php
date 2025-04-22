<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du matériel</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .image { max-width: 300px; margin-bottom: 20px; }
        .label { font-weight: bold; }
        .bloc { margin-bottom: 10px; }
    </style>
</head>
<body>

    <h1>Détail du matériel</h1>

    <?php if (!empty($materiel['photo'])): ?>
        <div><img src="<?= base_url($materiel['photo']) ?>" class="image" alt="Photo du matériel"></div>
    <?php endif; ?>

    <div class="bloc"><span class="label">Désignation :</span> <?= esc($materiel['designation'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Catégorie :</span> <?= esc($materiel['categorie'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Marque :</span> <?= esc($materiel['marque'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Modèle :</span> <?= esc($materiel['modele'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">État :</span> <?= esc($materiel['etat'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Disponible :</span> <?= isset($materiel['dispo']) ? ($materiel['dispo'] ? 'Oui' : 'Non') : 'Inconnu' ?></div>
    <div class="bloc"><span class="label">Lieu :</span> <?= esc($materiel['lieu'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Numéro de série :</span> <?= esc($materiel['num_serie'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Numéro inventaire :</span> <?= esc($materiel['num_inventaire'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Prix d'achat :</span> <?= esc($materiel['prix_achat'] ?? 'Non renseigné') ?></div>
    <div class="bloc"><span class="label">Fournisseur :</span> <?= esc($materiel['fournisseur'] ?? 'Non renseigné') ?></div>


    <?php if (!empty($lot)): ?>
    <div class="bloc">
        <span class="label">Lot associé :</span>
        <a href="<?= base_url('lots/' . $lot['id_lot']) ?>">
            <?= esc($lot['nom_lot']) ?>
        </a>
    </div>
    <?php else: ?>
        <div class="bloc">
            <span class="label">Lot associé :</span>
            <em>Aucun</em>
        </div>
    <?php endif; ?>


    <p><a href="<?= base_url('materiel') ?>">← Retour à la liste</a></p>
    
</body>
</html>
