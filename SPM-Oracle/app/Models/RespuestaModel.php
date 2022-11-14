<?php 

namespace App\Models;

use CodeIgniter\Model;

class RespuestaModel extends Model
{
    protected $table      = 'RESPUESTA';
    protected $primaryKey = 'ID_RESPUESTA';

    protected $returnType     = 'array';
    protected $allowedFields = ['RESPUESTA', 'ID_PREGUNTA', 'ID_POSTULACION'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}