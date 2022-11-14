<?php 

namespace App\Models;

use CodeIgniter\Model;

class UniversidadModel extends Model
{
    protected $table      = 'universidad';
    protected $primaryKey = 'ID_UNIVERSIDAD';

    protected $returnType     = 'array';
    protected $allowedFields = ['NOMBRE', 'ESTADO', 'ID_PAIS'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}