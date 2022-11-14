<?php 

namespace App\Models;

use CodeIgniter\Model;

class AdministrativoModel extends Model
{
    protected $table      = 'administrativo';
    protected $primaryKey = 'ID_ADMIN';

    protected $returnType     = 'array';
    protected $allowedFields = [''];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}