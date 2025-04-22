<?php

namespace App\Controllers;

use App\Models\LotModel;
use App\Models\MaterielModel;
use CodeIgniter\Controller;

class LotController extends Controller
{
    public function index()
    {
        $model = new LotModel();
        $data['lots'] = $model->findAll();

        return view('lot_list', $data);
    }

    public function detail($id)
    {
        $lotModel = new LotModel();
        $materielModel = new MaterielModel();

        $lot = $lotModel->find($id);

        if (!$lot) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Lot introuvable !");
        }

        // Tous les matériels dont num_lot = id
        $materiels = $materielModel->where('num_lot', $id)->findAll();

        return view('lot_detail', [
            'lot' => $lot,
            'materiels' => $materiels
        ]);
    }
}
