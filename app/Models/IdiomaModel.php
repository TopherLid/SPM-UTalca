<?php 

namespace App\Models;

use CodeIgniter\Model;

class IdiomaModel extends Model
{
    protected $table      = 'idioma';
    protected $primaryKey = 'ID_IDIOMA';

    protected $returnType     = 'array';
    protected $allowedFields = ['IDIOMA', 'ESTADO'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}