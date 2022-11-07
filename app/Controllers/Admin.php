<?php

namespace App\Controllers;

use App\Models\PostulacionModel;
use App\Models\ProgramaModel;
use App\Models\ConvocatoriaModel;
use App\Models\MovilidadModel;

class Admin extends BaseController
{
    public function home()
    {
        #Función Home, muestra la vista de inicio de todas las funciones administrativas

        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        /**
         * Registra la información administrativa en usuario
         */
        
        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];
        
        $convocatoriaModel = new ConvocatoriaModel();
        $movilidadModel = new MovilidadModel();
        $programaModel = new ProgramaModel();
        $postulacionModel = new PostulacionModel();

        #Busca la última convocatoria creada

        $convocatoria = $convocatoriaModel->select('*')->orderBy('ID_CONVOCATORIA', 'DESC')->first();   

        if (is_null($convocatoria) || empty($convocatoria)) {

            $no_info=true;
        
            /**
             * Siempre y cuando no existan convocatorias,
             * Toma la información y la guarda en el arreglo data, el cual, es mostrado en la vista
             * La vista contiene Alerta para que el usuario cree una convocatoria
             */
            $data = array('usuario'=>$usuario, 'no_info'=>$no_info);
    
            return view('admin/index', $data);
    
        } else {

            /**
             * Cuando existe una convocatoria busca la última creada
             * Busca el programa, las postulaciones y la movilidad del estudiante
             * Si la cantidad de postulaciones es distinto de 0, cuenta todas las postulaciones
             */

            $no_info=false;

            $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
            $postulaciones = $postulacionModel->select('*')->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll();

            $contador = 0;

            if (! is_null($postulaciones)){
                $contador = count($postulaciones);
            }
        }

        $data=array('programa'=>$programa, 'convocatoria'=>$convocatoria, 'usuario'=>$usuario, 'contador'=>$contador, 'no_info'=>$no_info);
            
        return view('admin/index', $data);
    }

    public function logout()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        /**
         * Elimina la sesión PHP y redirecciona al sitio de la U
         */

        $session->destroy();
        return redirect()->to('https://www.utalca.cl');
    }
}
