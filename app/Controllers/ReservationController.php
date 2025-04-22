<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use CodeIgniter\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $model = new ReservationModel();
        $data['reservations'] = $model->findAll();

        return view('reservation_list', $data);
    }


}