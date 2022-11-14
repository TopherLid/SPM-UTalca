<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetalleUniversidadModel extends Model
{
    protected $table      = 'detalle_universidad';
    protected $primaryKey = 'ID_DET_UNIVERSIDAD';

    protected $returnType     = 'array';
    protected $allowedFields = ['ID_UNIVERSIDAD', 'ID_PROGRAMA'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}