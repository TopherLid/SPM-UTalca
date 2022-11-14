<?php 

namespace App\Models;

use CodeIgniter\Model;

class PostulacionModel extends Model
{
    protected $table      = 'POSTULACION';
    protected $primaryKey = 'ID_POSTULACION';

    protected $returnType     = 'array';
    protected $allowedFields = ['NACIONALIDAD', 'N_TELEFONO', 'EMAIL_PERSONAL', 'NIVEL_INGLES', 'IDIOMA_2', '1RA_OPCION', 
    '2DA_OPCION', '3RA_OPCION', 'SELECCION', 'ESTADO', 'ID_CONVOCATORIA', 'ID_MOVILIDAD', 'ID_ESTUDIANTE', 'CONFIRMACION'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}