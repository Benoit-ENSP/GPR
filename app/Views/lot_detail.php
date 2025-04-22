<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du lot</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        img { max-width: 80px; }
    </style>
</head>
<body>

    <h1>🎒 Détail du lot : <?= esc($lot['nom_lot']) ?></h1>

    <p><strong>Observations :</strong> <?= esc($lot['lot_obs']) ?></p>
    <p><strong>Accessoires :</strong> <?= esc($lot['lot_acc']) ?></p>
    <p><strong>Disponible :</strong> <?= $lot['dispo'] ? '✅ Oui' : '❌ Non' ?></p>

    <h2>📦 Matériels contenus dans ce lot :</h2>

    <?php if (empty($materiels)): ?>
        <p><em>Aucun matériel n'est associé à ce lot.</em></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Catégorie</th>
                    <th>Marque</th>
                    <th>État</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materiels as $m): ?>
                    <tr>
                        <td>
                            <a href="<?= base_url('materiel/' . $m['id_materiel']) ?>">
                                <?= esc($m['designation']) ?>
                            </a>
                        </td>
                        <td><?= esc($m['categorie']) ?></td>
                        <td><?= esc($m['marque']) ?></td>
                        <td><?= esc($m['etat']) ?></td>
                        <td>
                            <?php if (!empty($m['photo'])): ?>
                                <img src="<?= base_url($m['photo']) ?>" alt="photo">
                            <?php else: ?>
                                <em>Pas d'image</em>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <p><a href="<?= base_url('lots') ?>">← Retour à la liste des lots</a></p>

</body>
</html>
