<?php 

namespace App\Models;

use CodeIgniter\Model;

class MovilidadModel extends Model
{
    protected $table      = 'MOVILIDAD';
    protected $primaryKey = 'ID_MOVILIDAD';

    protected $returnType     = 'array';
    protected $allowedFields = ['FECHA_INICIO', 'FECHA_FIN', 'SEMESTRE', 'ESTADO', 'ID_ESTUDIANTE'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}