<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des membres</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>

    <h1>👥 Liste des membres</h1>
    <h2><?= count($membres) ?> personne(s) présente(s)</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Admin GPR ?</th>
                <th>OAuth UID</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membres as $m): ?>
                <tr>
                    <td><?= esc($m['id']) ?></td>
                    <td><?= esc($m['last_name']) ?></td>
                    <td><?= esc($m['first_name']) ?></td>
                    <td><?= esc($m['email']) ?></td>
                    <td><?= $m['adminGPR'] ? '✅ Oui' : '❌ Non' ?></td>
                    <td><?= esc($m['oauth_uid']) ?></td>
                    <td><?= esc($m['an']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="<?= base_url('materiel') ?>">← Retour au matériel</a></p>

</body>
</html>
