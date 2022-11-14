<?php

namespace App\Controllers;

use App\Models\PreguntaModel;
use App\Models\OpcionesPMultipleModel;

class Formulario extends BaseController 
{
    public function formulario()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada == false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }
    
        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];

        $preguntaModel = new PreguntaModel();
        $opcionesPMultipleModel = new OpcionesPMultipleModel();

        $preguntas_base = $preguntaModel->orderBy('ID_PREGUNTA', 'DESC')->paginate(25);
        $paginador = $preguntaModel->pager;

        if(empty($preguntas_base) || is_null($preguntas_base)){

            $preguntas = false;

        } else {

            $contador = 0;

            foreach ($preguntas_base as $pregunta) {

                $contador_opciones = 1;

                if ($pregunta['TIPO']=="Múltiple"){

                    $opciones = $opcionesPMultipleModel->select('*')->where('ID_PREGUNTA', $pregunta['ID_PREGUNTA'])->findAll();

                    $cambiar[$contador] = [
                        'ID_PREGUNTA' => $pregunta['ID_PREGUNTA'],
                        'TIPO' => $pregunta['TIPO'],
                        'TITULO' => $pregunta['TITULO'],
                        'TIPO_INPUT' => $pregunta['TIPO_INPUT']
                    ];
                    
                    foreach($opciones as $opcion){

                        $cambiar[$contador] += ['opcion_'.$contador_opciones => $opcion['OPCION_PMULTIPLE']];
                        $contador_opciones++;
                    }

                    $cambiar[$contador] += ['contador_opciones'=>$contador_opciones];

                    $preguntas = array_replace($preguntas_base, $cambiar);
                    $contador++;
                }
            }
        }

        /**
         * 
         * ID_PREGUNTA
         * TIPO -> individual / múltiple
         * TITULO
         * TIPO_INPUT -> text, number, date. email / checkbox, radio, dropdown
         * 
         **/ 

        $data = array('preguntas'=>$preguntas, 'usuario'=>$usuario, 'paginador'=>$paginador);
        
        return view('admin/formularios/vista', $data);
    }

    /**
     * Función de crear una pregunta (relacionado a las opciones que permite visualizar la creación)
     */
    

    public function crear_input()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $preguntaModel = new PreguntaModel();

        $tipo = $this->request->getVar('tipo');
        $titulo = $this->request->getVar('titulo_pregunta');
        $tipo_input = $this->request->getVar('tipo_pregunta');

        $data = [
            'TIPO' => "input",
            'TITULO' => $titulo,
            'TIPO_INPUT' => $tipo_input
        ];

        if ($preguntaModel->insert($data)){

            $session-> setFlashData('status', 'Se ha añadido un nuevo campo "Input", para utilizarlo en el siguiente formulario, debe ser asignado a una convocatoria.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');

        } else {

            $session-> setFlashData('status', 'No se ha creado la pregunta.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/formulario');
        }
    }

    public function crear_multiple()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $preguntaModel = new PreguntaModel();
        $opcionesPMultipleModel = new OpcionesPMultipleModel(); 

        $titulo = $this->request->getVar('etiqueta');
        $tipo_input = $this->request->getVar('tipo_pregunta');

        $data = [
            'TIPO' => 'Múltiple',
            'TITULO' => $titulo,
            'TIPO_INPUT' => $tipo_input
        ];

        if ($preguntaModel->insert($data)){

            $ultima_pregunta = $preguntaModel ->select('*')->orderBy('ID_PREGUNTA', 'DESC')->first();

            $opciones = $this->request->getVar('total_opciones');
            
            for ($i=1; $i <= $opciones; $i++) { 
                
                $opcion = $this->request->getVar('nuevo_'.$i);
                $insertar_opcion = [
                    'OPCION_PMULTIPLE' => $opcion,
                    'ID_PREGUNTA' => $ultima_pregunta['ID_PREGUNTA']
                ];

                $opcionesPMultipleModel->insert($insertar_opcion);
            }

            $session-> setFlashData('status', 'Se ha añadido un nuevo campo de selección múltiple, para utilizarlo en el siguiente formulario, debe ser asignado a una convocatoria.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');

        } else {

            return redirect()->to('admin/formulario');
        }
    }

    /**
     * Función de modificar una pregunta pronta a ser eliminada por inutil jeje
     */
    
    public function modificar()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $preguntaModel = new PreguntaModel();

        $aux = $this->request->getVar('id_pregunta');

        $pregunta = $preguntaModel->find($aux);

        if ($pregunta != "Simple") {

            $session-> setFlashData('status', 'No se puede modificar (Pregunta múltiple).');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/formulario');
        }

        $data = [
            'TIPO'=> "Simple",
            'TITULO'=>  $this->request->getVar('titulo_pregunta'),
            'TIPO_INPUT' => $this->request->getVar('tipo_simple')
        ];

        if ($preguntaModel->update($aux, $data)){

            $session-> setFlashData('status', 'Pregunta modificada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');
        } else {
            $session-> setFlashData('status', 'No se pudo modificar.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return view('admin/convicatorias/error'); #('errors/admin/convocatoria') o redirect -> controlador -> error
        }  
    }    

    public function modificar_multiple()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $preguntaModel = new PreguntaModel();
        $opcionesPMultipleModel = new OpcionesPMultipleModel(); 

        $aux = $this->request->getVar('id_pregunta_m');

        $pregunta = $preguntaModel->find($aux);
        $opciones = $opcionesPMultipleModel->select('*')->where('ID_PREGUNTA', $aux)->findAll();

        if ($pregunta != "Múltiple") {

            $session-> setFlashData('status', 'No se puede modificar (Pregunta Simple).');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            //return redirect()->to('admin/formulario');
        }

        $data = [
            'TIPO'=> "Múltiple",
            'TITULO'=>  $this->request->getVar('titulo_pregunta_m'),
            'TIPO_INPUT' => $this->request->getVar('tipo_multiple')
        ];

        if ($preguntaModel->update($aux, $data)){

            $total_opciones = $this->request->getVar('total_campo_m');

            if (! is_null($opciones) || ! empty($opciones)){ 
                foreach ($opciones as $opcion) {
                    $opcionesPMultipleModel->delete($opcion['ID_OPCIONES_PM']);
                }
            }

            
            for ($i=1; $i <= $total_opciones; $i++) { 
                
                $opcion = $this->request->getVar('m_nuevo_'.$i);
                
                var_dump($opcion);

                $insertar_opcion = [
                    'OPCION_PMULTIPLE' => $opcion,
                    'ID_PREGUNTA' => $aux
                ];

                $opcionesPMultipleModel->insert($insertar_opcion);
            }

            $session-> setFlashData('status', 'Pregunta modificada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');
        } else {
            $session-> setFlashData('status', 'No se pudo modificar.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return view('admin/convicatorias/error'); #('errors/admin/convocatoria') o redirect -> controlador -> error
        }  

        $session-> setFlashData('status', 'Se han modificado las opciones de la pregunta.');
        $session-> setFlashData('status_action', 'alert-success');
        $session-> setFlashData('status_alert', '¡Correcto!');

        return redirect()->to('admin/formulario');
    }
}


/*
 
    El apartado pregunta puede ser reducido a pregunta con el titulo y el tipo
    en caso de ser múltiple -> opciones pmultiple.


 */