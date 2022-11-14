<?php 

namespace App\Models;

use CodeIgniter\Model;

class CarreraModel extends Model
{
    protected $table      = 'CARRERA';
    protected $primaryKey = 'ID_CARRERA';

    protected $returnType     = 'array';
    protected $allowedFields = [''];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}