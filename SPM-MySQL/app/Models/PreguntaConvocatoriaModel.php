<?php 

namespace App\Models;

use CodeIgniter\Model;

class PreguntaConvocatoriaModel extends Model
{
    protected $table      = 'pregunta_convocatoria';
    protected $primaryKey = 'ID_DETALLE_PREGUNTA';

    protected $returnType     = 'array';
    protected $allowedFields = ['ID_PREGUNTA', 'ID_CONVOCATORIA'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}