<?php 

namespace App\Models;

use CodeIgniter\Model;

class PaisModel extends Model
{
    protected $table      = 'PAIS';
    protected $primaryKey = 'ID_PAIS';

    protected $returnType     = 'array';
    protected $allowedFields = ['NOMBRE'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}