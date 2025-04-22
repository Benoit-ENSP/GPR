<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpruntModel extends Model
{
    protected $table = 'emprunt';
    protected $primaryKey = 'id_emprunt';

    protected $allowedFields = [
        'id_materiel', 'lot', 'id_lot',
        'id_user', 'date_debut', 'date_retour',
        'observation', 'emprunteur', 'emprunteur_retour'
    ];
}
