<?php

namespace App\Models;

use CodeIgniter\Model;

class MembresModel extends Model
{
    protected $table = 'membres';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;

    // ✅ Champs autorisés si on décide de modifier un utilisateur plus tard
    protected $allowedFields = [
        'email',
        'adminGPR'
    ];
    
    protected $useTimestamps = false;
}
