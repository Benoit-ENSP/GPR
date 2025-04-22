<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des réservations</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>

    <h1>📅 Liste des réservations</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Matériel</th>
                <th>Lot ?</th>
                <th>ID Lot</th>
                <th>ID Utilisateur</th>
                <th>Début</th>
                <th>Retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $r): ?>
                <tr>
                    <td><?= esc($r['id_reservation']) ?></td>
                    <td><?= esc($r['id_materiel']) ?></td>
                    <td><?= $r['lot'] ? '✅ Oui' : '❌ Non' ?></td>
                    <td><?= esc($r['id_lot']) ?></td>
                    <td><?= esc($r['id_user']) ?></td>
                    <td><?= esc($r['date_debut']) ?></td>
                    <td><?= esc($r['date_retour']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="<?= base_url('materiel') ?>">← Retour au matériel</a></p>

</body>
</html>
