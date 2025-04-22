<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des lots</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>

    <h1>📦 Liste des lots</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du lot</th>
                <th>Observation</th>
                <th>Accessoires</th>
                <th>Dégât</th>
                <th>Manquant</th>
                <th>Catégorie</th>
                <th>Disponible</th>
                <th>Projet lié</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lots as $lot): ?>
                <tr>
                    <td><?= esc($lot['id_lot']) ?></td>
                    <td><a href="<?= base_url('lots/' . $lot['id_lot']) ?>"><?= esc($lot['nom_lot']) ?></a></td>
                    <td><?= esc($lot['lot_obs']) ?></td>
                    <td><?= esc($lot['lot_acc']) ?></td>
                    <td><?= $lot['degat'] ? '❌ Oui' : '✅ Non' ?></td>
                    <td><?= $lot['manquant'] ? '❌ Oui' : '✅ Non' ?></td>
                    <td><?= esc($lot['lot_cat']) ?></td>
                    <td><?= $lot['dispo'] ? '✅ Oui' : '❌ Non' ?></td>
                    <td><?= esc($lot['num_projet']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="<?= base_url('materiel') ?>">← Retour aux matériels</a></p>

</body>
</html>
