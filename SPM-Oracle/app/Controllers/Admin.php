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

        # Busca la última convocatoria creada

        $convocatoria = $convocatoriaModel->select('*')->orderBy('ID_CONVOCATORIA', 'DESC')->first();   

        # En caso de ser vacía retorna False para ser trabajada en la vista

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

            $server = date("d/m/Y");

            if ($server > $convocatoria['FECHA_FIN'])
                $atrasado = true;
            else
                $atrasado = false;

            /**
             * Cuando existe una convocatoria busca la última creada
             * Busca el programa, las postulaciones y la movilidad del estudiante
             * Si la cantidad de postulaciones es distinto de 0, cuenta todas las postulaciones
             */

            $no_info=false;

            $finder_aceptados = array(
                'ESTADO' => 'Aceptada',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );

            $aceptados = count($postulacionModel->where($finder_aceptados)->findAll());

            $finder_rechazado = array(
                'ESTADO' => 'Rechazada',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );

            $rechazado = count($postulacionModel->where($finder_rechazado)->findAll());

            $finder_becados = array(
                'ESTADO' => 'Aceptado con Beca',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $aceptados_becados = count($postulacionModel->where($finder_becados)->findAll());


            $postulaciones_contadas = [
                'Aceptadas' => $aceptados,
                'Rechazadas' => $rechazado,
                'Becados' => $aceptados_becados
            ];

            /**
             * Busca todas las movilidades de la última convocatoria finalizada
             */

            $preparacion = array(
                'ESTADO' => 'En preparación',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $preparados = count($movilidadModel->where($preparacion)->findAll());

            $curso = array(
                'ESTADO' => 'En curso',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $cursados = count($movilidadModel->where($curso)->findAll());

            $correcta = array(
                'ESTADO' => 'Correcta',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $correctos = count($movilidadModel->where($correcta)->findAll());

            $cancelada = array(
                'ESTADO' => 'Cancelada',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $cancelados = count($movilidadModel->where($cancelada)->findAll());

            $finalizada = array(
                'ESTADO' => 'Finalizada',
                'ID_CONVOCATORIA' => $convocatoria['ID_CONVOCATORIA']
            );
            $finalizados = count($movilidadModel->where($finalizada)->findAll());

            $movilidad_contadas = [
                'Preparacion' => $preparados,
                'Curso' => $cursados,
                'Cancelada'=> $correctos,
                'Correcta' => $cancelados,
                'Finalizada' => $finalizados
            ];

            $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
            $contador = count($postulacionModel->select('*')->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll());
        }

        $data=array('programa'=>$programa, 'convocatoria'=>$convocatoria, 'usuario'=>$usuario, 'contador'=>$contador, 'no_info'=>$no_info, 
        'postulaciones_contadas'=>$postulaciones_contadas, 'movilidad_contadas'=>$movilidad_contadas, 'atrasado'=>$atrasado);
            
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
