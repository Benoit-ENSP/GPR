<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un matériel</title>
</head>
<body>

    <h1>➕ Ajouter un nouveau matériel</h1>

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
        <a href="<?= base_url('materiel') ?>">Annuler</a>
    </form>

</body>
</html>
