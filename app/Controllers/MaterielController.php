<?php

namespace App\Controllers;

use App\Models\MaterielModel;
use CodeIgniter\Controller;
use Config\Database;

class MaterielController extends Controller
{
    public function index()
{
    $model = new \App\Models\MaterielModel();

    // Si "ajout" est dans l'URL → on affiche le formulaire
    if ($this->request->getGet('ajout')) {
        return view('materiel_add_form'); // vue séparée
    }

    // Sinon → afficher la liste
    $data['materiels'] = $model->findAll();
    return view('materiel_list', $data);
}


    // 🔁 Méthode pour afficher la vue en se connectant à gpr_test
    public function test()
    {
        $db = Database::connect('tests'); // Connexion à gpr_test
        $model = new MaterielModel($db);  // On injecte cette connexion dans le modèle

        $data['materiels'] = $model->findAll();

        return view('materiel_list', $data);
    }

    // 🔍 Méthode de vue de détail d’un matériel
    public function detail($id)
{
    $model = new MaterielModel();
    $materiel = $model->find($id);

    if (!$materiel) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Matériel introuvable !");
    }

    $lot = null;
    if (!empty($materiel['num_lot']) && $materiel['num_lot'] != 0) {
        $lotModel = new \App\Models\LotModel();
        $lot = $lotModel->find($materiel['num_lot']);
    }

    return view('materiel_detail', [
        'materiel' => $materiel,
        'lot' => $lot
    ]);
}

    


    public function create()
{
    // Charger le modèle
    $model = new \App\Models\MaterielModel();

    // Récupérer les données du formulaire
    $data = [
        'designation' => $this->request->getPost('designation'),
        'categorie'   => $this->request->getPost('categorie'),
        'marque'      => $this->request->getPost('marque'),
        'etat'        => $this->request->getPost('etat'),
        'dispo'       => $this->request->getPost('dispo') ? 1 : 0
    ];

    // Gérer l'image si elle est envoyée
    $photo = $this->request->getFile('photo');
    if ($photo && $photo->isValid() && !$photo->hasMoved()) {
        // Renommer le fichier pour éviter les doublons
        $newName = $photo->getRandomName();
        $photo->move('images', $newName); // images/ est dans public/
        $data['photo'] = 'images/' . $newName;
    }

    // Sauvegarder dans la base
    $model->insert($data);

    // Rediriger vers la liste (refresh)
    return redirect()->to('/materiel');
}

}
