<?php 

namespace App\Models;

use CodeIgniter\Model;

class ConvocatoriaModel extends Model
{
    protected $table      = 'CONVOCATORIA';
    protected $primaryKey = 'ID_CONVOCATORIA';

    protected $returnType     = 'array';
    protected $allowedFields = ['NOMBRE', 'FECHA_INICIO', 'FECHA_FIN', 'ESTADO', 'MIN_CREDITO_SCT', 'MAX_CREDITO_SCT', 
                                'NOTIFICACION', 'RAMOS_REPROBADOS', 'ID_PROGRAMA'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}