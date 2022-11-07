<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProgramaModel extends Model
{
    protected $table      = 'programa';
    protected $primaryKey = 'ID_PROGRAMA';

    protected $returnType     = 'array';
    protected $allowedFields = ['NOMBRE', 'DESCRIPCION', 'ESTADO'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}