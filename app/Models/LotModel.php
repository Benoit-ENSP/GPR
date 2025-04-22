<?php

namespace App\Models;

use CodeIgniter\Model;

class LotModel extends Model
{
    protected $table = 'lot';
    protected $primaryKey = 'id_lot';

    protected $allowedFields = [
        'nom_lot', 'lot_obs', 'lot_acc',
        'degat', 'manquant', 'lot_cat', 'dispo', 'num_projet'
    ];
}
