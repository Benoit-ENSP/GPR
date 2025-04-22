<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste du matériel</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        img { max-width: 100px; height: auto; }
        a, button { text-decoration: none; color: #007bff; cursor: pointer; }
        .hidden { display: none; }
        .form-box { margin-top: 30px; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; }
    </style>
</head>
<body>

    <h1>📋 Liste du matériel</h1>

    <!-- BOUTON POUR AFFICHER / CACHER LE FORMULAIRE -->
    <button onclick="toggleForm()">➕ Ajouter un nouveau matériel</button>

    <!-- FORMULAIRE CACHÉ -->
    <div id="formContainer" class="form-box hidden">
        <h2>Ajouter un matériel</h2>
        <form action="<?= base_url('materiel/create') ?>" method="post" enctype="multipart/form-data">
            <label>Désignation :
                <input type="text" name="designation" required>
            </label><br><br>

            <label>Catégorie :
                <input type="text" name="categorie">
            </label><br><br>

            <label>Marque :
                <input type="text" name="marque">
            </label><br><br>

            <label>État :
                <input type="text" name="etat">
            </label><br><br>

            <label>Disponible :
                <input type="checkbox" name="dispo" checked>
            </label><br><br>

            <label>Photo :
                <input type="file" name="photo" accept="image/*">
            </label><br><br>

            <button type="submit">Ajouter</button>
            <button type="button" onclick="toggleForm()">Annuler</button>
        </form>
    </div>

    <!-- TABLEAU DES MATERIELS -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Marque</th>
                <th>État</th>
                <th>Disponible</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materiels as $m): ?>
                <tr>
                    <td><?= esc($m['id_materiel']) ?></td>
                    <td>
                        <a href="<?= base_url('materiel/' . $m['id_materiel']) ?>">
                            <?= esc($m['designation']) ?>
                        </a>
                    </td>
                    <td><?= esc($m['categorie'] ?? '—') ?></td>
                    <td><?= esc($m['marque'] ?? '—') ?></td>
                    <td><?= esc($m['etat'] ?? '—') ?></td>
                    <td><?= isset($m['dispo']) ? ($m['dispo'] ? '✅' : '❌') : 'Inconnu' ?></td>
                    <td>
                        <?php if (!empty($m['photo'])): ?>
                            <img src="<?= base_url($m['photo']) ?>" alt="Photo">
                        <?php else: ?>
                            <em>Pas d'image</em>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- SCRIPT JS pour toggle le formulaire -->
    <script>
        function toggleForm() {
            const form = document.getElementById('formContainer');
            form.classList.toggle('hidden');
        }

       

    </script>

</body>
</html>
