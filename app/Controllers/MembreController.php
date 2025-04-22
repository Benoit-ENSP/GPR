<?php

namespace App\Controllers;

use App\Models\MembreModel;
use CodeIgniter\Controller;

class MembreController extends Controller
{
    public function index()
    {
        $model = new MembreModel();
        $data['membres'] = $model->findAll();

        return view('membre_list', $data);
    }
}
