<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'ID_USUARIO';

    protected $returnType     = 'array';
    protected $allowedFields = [''];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}