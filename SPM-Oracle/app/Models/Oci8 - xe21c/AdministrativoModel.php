<?php 

namespace App\Models;

use CodeIgniter\Model;

class AdministrativoModel extends Model
{
    protected $table      = 'ADMINISTRATIVO';
    protected $primaryKey = 'ID_ADMIN';

    protected $returnType     = 'array';
    protected $allowedFields = [''];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}