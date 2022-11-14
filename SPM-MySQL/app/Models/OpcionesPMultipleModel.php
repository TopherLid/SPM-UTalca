<?php 

namespace App\Models;

use CodeIgniter\Model;

class OpcionesPMultipleModel extends Model
{
    protected $table      = 'opciones_preg_multiple';
    protected $primaryKey = 'ID_OPCIONES_PM';

    protected $returnType     = 'array';
    protected $allowedFields = ['OPCION_PMULTIPLE', 'ID_PREGUNTA'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}