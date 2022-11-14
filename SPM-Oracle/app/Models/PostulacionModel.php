<?php 

namespace App\Models;

use CodeIgniter\Model;

class PostulacionModel extends Model
{
    protected $table      = 'POSTULACION';
    protected $primaryKey = 'ID_POSTULACION';

    protected $returnType     = 'array';
    protected $allowedFields = ['NACIONALIDAD', 'N_TELEFONO', 'EMAIL_PERSONAL', 'NIVEL_INGLES', 'IDIOMA_2', 'PRIMERA_OPCION', 
    'SEGUNDA_OPCION', 'TERCERA_OPCION', 'SELECCION', 'ESTADO', 'ID_CONVOCATORIA', 'ID_MOVILIDAD', 'ID_ESTUDIANTE', 'CONFIRMACION'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
}