<?php

namespace App\Models;

use CodeIgniter\Model;

class MembreModel extends Model
{
    protected $table = 'membres';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'genre', 'last_name', 'first_name',
        'adresse', 'telephone', 'portable',
        'email', 'email_perso', 'adminGPR',
        'oauth_uid', 'an'
    ];
}
