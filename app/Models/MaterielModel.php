<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterielModel extends Model
{
    protected $table = 'materiel';
    protected $primaryKey = 'id_materiel';

    protected $allowedFields = [
        'propriete', 'categorie', 'designation', 'marque', 'modele',
        'observation', 'num_serie', 'num_inventaire', 'fournisseur',
        'date_achat', 'prix_achat', 'etat', 'pret', 'dispo', 'num_lot',
        'nbr_jour', 'type_1', 'lieu', 'os_1', 'version_1', 'user',
        'fabricant_1', 'creation', 'creat_user', 'modification', 'modif_user',
        'num_projet', 'photo'
    ];
}
