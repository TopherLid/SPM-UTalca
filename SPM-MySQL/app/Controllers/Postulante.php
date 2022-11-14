<?php

namespace App\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\PostulacionModel;
use App\Models\UniversidadModel;
use App\Models\ProgramaModel;
use App\Models\EstudianteModel;
use App\Models\CarreraModel;

use App\Models\MovilidadModel;
use App\Models\IdiomaModel;
use App\Models\PaisModel;

use App\Models\PreguntaModel;
use App\Models\RespuestaModel;
use App\Models\PreguntaConvocatoriaModel;

class Postulante extends BaseController 
{
    public function postulantes()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();
        $postulacionModel = new PostulacionModel();
        $estudianteModel = new EstudianteModel();
        
        $carreraModel = new CarreraModel();
        $programaModel = new ProgramaModel();
        
        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];

        $convocatorias = $convocatoriaModel->orderBy('ID_CONVOCATORIA', 'DESC')->findAll();

        /**
         * La función paginate muestra un máximo de 25 datos en la tabla, generando un botón para ver los sgtes 25 datos
         */
        
        $postulaciones_base = $postulacionModel->orderBy('ID_POSTULACION', 'DESC')->paginate(25);
        $paginador = $postulacionModel->pager;
        


        if (is_null($postulaciones_base) || empty($postulaciones_base)){
            $postulaciones = false;
        } else {
            
            $contador = 0;
            
            foreach ($postulaciones_base as $aux){
    
                $estudiante = $estudianteModel->find($aux['ID_ESTUDIANTE']);
                $carrera = $carreraModel -> find($estudiante['ID_CARRERA']);
                $convocatoria = $convocatoriaModel->find($aux['ID_CONVOCATORIA']);
                $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
    
                $cambiar_postulaciones[$contador]=[
                    'ID_POSTULACION' => $aux['ID_POSTULACION'],
                    'NOMBRE' => $estudiante['NOMBRE'],
                    'MATRICULA'=> $estudiante['MATRICULA'],
                    'CARRERA' => $carrera['NOMBRE'],
                    'CONFIRMACION' => $aux['CONFIRMACION'],
                    'ID_CONVOCATORIA' => $aux['ID_CONVOCATORIA'],
                    'NOMBRE_CONVOCATORIA' => $convocatoria['NOMBRE'],
                    'ESTADO_POSTULACION' => $aux['ESTADO'],
                    'NOMBRE_PROGRAMA' => $programa['NOMBRE']
                ];
    
                $postulaciones = array_replace($postulaciones_base, $cambiar_postulaciones);
                $contador++;
            }

        }

        /**
         * Toma la información y la guarda en el arreglo data, el cual, es mostrado en la vista
         */

        $data=array('postulaciones'=>$postulaciones, 'convocatorias'=>$convocatorias, 'usuario'=>$usuario, 'paginador'=>$paginador);

        return view('admin/postulaciones/vista', $data);
    }
    
    public function registro($aux)
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];
        
        $postulacionModel = new PostulacionModel();
        $estudianteModel = new EstudianteModel();
        $carreraModel = new CarreraModel();
        $programaModel = new ProgramaModel();
        $universidadModel = new UniversidadModel();
        $convocatoriaModel = new ConvocatoriaModel();

        $idiomaModel = new IdiomaModel();
        $paisModel = new PaisModel();

        $preguntaModel = new PreguntaModel();
        $respuestaModel = new RespuestaModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();
        
        $postulacion = $postulacionModel->find($aux);
        $estudiante = $estudianteModel ->find($postulacion['ID_ESTUDIANTE']);
        $convocatoria = $convocatoriaModel->find($postulacion['ID_CONVOCATORIA']);
        $carrera = $carreraModel->find($estudiante['ID_CARRERA']);
        $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
        
        $universidades_base = $universidadModel->findAll();
        $universidad1 = $universidadModel->find($postulacion['1RA_OPCION']);            
        $universidad2 = $universidadModel->find($postulacion['2DA_OPCION']);
        $universidad3 = $universidadModel->find($postulacion['3RA_OPCION']);

        $convocatoria = $convocatoriaModel->find($postulacion['ID_CONVOCATORIA']);

        $idioma = $idiomaModel ->find($postulacion['IDIOMA_2']);

        if($postulacion['SELECCION']==0 )
        {
            if($postulacion['ESTADO']=="Rechazado"){
                $seleccion = "Rechazado";
            }else{
                $seleccion = "No se ha asignado estado";
            }
        } else {
            $seleccion = $universidadModel->find($postulacion['SELECCION']);
        }

        $contador_u = 0;

        foreach ($universidades_base as $universidad){
            $pais = $paisModel -> find($universidad['ID_PAIS']);
            $cambiar[$contador_u]=[
                'ID_UNIVERSIDAD' => $universidad['ID_UNIVERSIDAD'],
                'NOMBRE' => $universidad['NOMBRE'],
                'PAIS' => $pais['NOMBRE']
            ];
            $universidades = array_replace($universidades_base, $cambiar);
            $contador_u++;
        }



        $preguntas_convocatoria = $preguntaConvocatoriaModel -> select('*')->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll();

        if ( is_null($preguntas_convocatoria) || empty($preguntas_convocatoria)) {
            $preguntas = false;
        } else {

            $contador_respuestas = 0; 

            foreach ($preguntas_convocatoria as $p_c){

                $pregunta = $preguntaModel->find($p_c['ID_PREGUNTA']);

                $finder = [
                    'ID_PREGUNTA' => $p_c['ID_PREGUNTA'],
                    'ID_POSTULACION' => $postulacion['ID_POSTULACION']
                ];

                $respuesta = $respuestaModel ->select('*')->where($finder)->first();

                $preguntas_r[$contador_respuestas] = [
                    'ID_PREGUNTA' => $pregunta['ID_PREGUNTA'],
                    'PREGUNTA' => $pregunta['TITULO'],
                    'RESPUESTA' => $respuesta['RESPUESTA']
                ];

                $preguntas = array_replace($preguntas_convocatoria, $preguntas_r);    
                $contador_respuestas++;
            }
        }

        /**
         * Toma la información y la guarda en el arreglo data, el cual, es mostrado en la vista
         */

        $data=array('programa'=>$programa, 'postulacion'=>$postulacion, 'carrera'=>$carrera, 'preguntas'=>$preguntas, 'estudiante'=>$estudiante, 'idioma'=>$idioma,
        'universidad1'=>$universidad1, 'universidad2'=>$universidad2, 'universidad3'=>$universidad3, 'universidades'=>$universidades, 'convocatoria' => $convocatoria,
        'usuario'=>$usuario, 'seleccion'=>$seleccion); 

        return view('admin/postulaciones/individual', $data);
    }

    public function seleccion()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $postulacionModel = new PostulacionModel();

        $aux = $this->request->getVar('id_postulacion');
        $estado = $this->request->getVar('estado_post');
        $u_seleccion = $this->request->getVar('seleccion');

        if ($estado == "Rechazado"){
            $data = [
                'ESTADO'=> "Rechazada",
                'SELECCION' => 0
            ];
        } 
        
        if ($estado == "Modificable") {
            $data = [
                'ESTADO'=> "Modificable",
                'SELECCION' => 0
            ];
        }

        if ($estado !="Rechazado" && $estado != "Modificable") {
            $data = [
                'ESTADO'=> $estado,
                'SELECCION' => $u_seleccion,
                'CONFIRMACION' => "En espera"
            ];
        }

        if ($postulacionModel->update($aux, $data)){

            $session-> setFlashData('status', 'El registro '.$aux.' ha sido actualizado correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');


            return redirect()->to('admin/postulantes/'.$aux);
        } else {

            $session-> setFlashData('status', 'El registro '.$aux.' no ha sido actualizado.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/postulantes/'.$aux);
        }  
    }


    public function confirmacion(){
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $postulacionModel = new PostulacionModel();
        $movilidadModel = new MovilidadModel();
        
        $aux = $this->request->getVar('id_confirmar');
        $seleccion = $this->request->getVar('seleccion');
        
        $data = [
            'SELECCION'=>$seleccion
        ];

        $postulacion = $postulacionModel-> find ($aux);

        if ($postulacionModel->update($aux, $data)){
            
            if ($seleccion=="Confirmado"){

                $movilidad = [
                    'ID_ESTUDIANTE' => $postulacion['ID_ESTUDIANTE']
                ];

                $movilidadModel->insert($movilidad);
            }

            $session-> setFlashData('status', 'El registro '.$aux.' se ha asignado como: '.$seleccion);
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/postulantes');
        } else {

            $session-> setFlashData('status', 'El registro '.$aux.' no ha sido actualizado.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/postulantes');
        }  
    }
}