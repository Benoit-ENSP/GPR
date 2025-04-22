<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id_reservation';

    protected $allowedFields = [
        'id_materiel', 'lot', 'id_lot',
        'id_user', 'date_debut', 'date_retour'
    ];
}
