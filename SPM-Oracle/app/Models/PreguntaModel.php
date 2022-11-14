<?php 

namespace App\Models;

use CodeIgniter\Model;

class PreguntaModel extends Model
{
    protected $table      = 'PREGUNTA';
    protected $primaryKey = 'ID_PREGUNTA';

    protected $returnType     = 'array';
    protected $allowedFields = ['TIPO', 'TITULO', 'TIPO_INPUT'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}