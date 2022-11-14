<?php 

namespace App\Models;

use CodeIgniter\Model;

class OpcionesPMultipleModel extends Model
{
    protected $table      = 'OPCIONES_PREG_MULTIPLE';
    protected $primaryKey = 'ID_OPCIONES_PM';

    protected $returnType     = 'array';
    protected $allowedFields = ['OPCION_PMULTIPLE', 'ID_PREGUNTA'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}