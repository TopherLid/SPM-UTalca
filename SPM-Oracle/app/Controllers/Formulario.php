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

        # En caso de ser vacía retorna False para ser trabajada en la vista

        if(empty($preguntas_base) || is_null($preguntas_base)){

            $preguntas = false;

        } else {

            $contador = 0;

            foreach ($preguntas_base as $pregunta) {

                # Si la pregunta es múltiple, busca las posibles opciones asociadas

                
                if ($pregunta['TIPO']=="Múltiple"){
                    
                    $contador_opciones = 1;

                    $opciones = $opcionesPMultipleModel->select('*')->where('ID_PREGUNTA', $pregunta['ID_PREGUNTA'])->findAll();

                    $cambiar[$contador] = [
                        'ID_PREGUNTA' => $pregunta['ID_PREGUNTA'],
                        'TIPO' => $pregunta['TIPO'],
                        'TITULO' => $pregunta['TITULO'],
                        'TIPO_INPUT' => $pregunta['TIPO_INPUT'],
                        'ESTADO' => $pregunta['ESTADO']
                    ];
                    
                    foreach($opciones as $opcion){

                        $cambiar[$contador] += ['opcion_'.$contador_opciones => $opcion['OPCION_PMULTIPLE']];
                        $contador_opciones++;
                    }

                    $cambiar[$contador] += ['contador_opciones'=>$contador_opciones];

                    $preguntas = array_replace($preguntas_base, $cambiar);
                    $contador++;
                } else {

                    $cambiar[$contador] = [
                        'ID_PREGUNTA' => $pregunta['ID_PREGUNTA'],
                        'TIPO' => $pregunta['TIPO'],
                        'TITULO' => $pregunta['TITULO'],
                        'TIPO_INPUT' => $pregunta['TIPO_INPUT'],
                        'ESTADO' => $pregunta['ESTADO']
                    ];

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

        # Crea una pregunta de tipo input simple

        $data = [
            'TIPO' => "Individual",
            'TITULO' => $titulo,
            'TIPO_INPUT' => $tipo_input
        ];

        if ($preguntaModel->save($data)){

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'Se ha añadido un nuevo campo "Input", para utilizarlo en el siguiente formulario, debe ser asignado a una convocatoria.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');

        } else {

            # Devuelve a Formulario con alerta bootstrap

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

        /**
         * Crea una pregunta de tipo input de múltiples opciones
         * las opciones son almacenadas en OpcionesPMultiple
         */

        $titulo = $this->request->getVar('etiqueta');
        $tipo_input = $this->request->getVar('tipo_pregunta');

        $data = [
            'TIPO' => 'Múltiple',
            'TITULO' => $titulo,
            'TIPO_INPUT' => $tipo_input
        ];

        if ($preguntaModel->save($data)){

            /**
             * Toma la cantidad de opciones de un hidden input
             * Crea un bucle for para la misma cantidad
             * Inserta cada opción guardada por el nombre 'nuevo_(posición del for)'
             * hasta llegar al número del hidden input 
             */

            $ultima_pregunta = $preguntaModel ->select('*')->orderBy('ID_PREGUNTA', 'DESC')->first();
            $opciones = $this->request->getVar('total_opciones');
            
            for ($i=1; $i <= $opciones; $i++) { 
                
                $opcion = $this->request->getVar('nuevo_'.$i);
                $insertar_opcion = [
                    'OPCION_PMULTIPLE' => $opcion,
                    'ID_PREGUNTA' => $ultima_pregunta['ID_PREGUNTA']
                ];

                $opcionesPMultipleModel->save($insertar_opcion);
            }

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'Se ha añadido un nuevo campo de selección múltiple, para utilizarlo en el siguiente formulario, debe ser asignado a una convocatoria.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');

        } else {

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'No se ha creado la pregunta.');
            $session-> setFlashData('status_action', 'alert-damger');
            $session-> setFlashData('status_alert', '¡Error!');

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

        # Si la pregunta no es Simple devuelve sin realizar modificaciones

        if ($pregunta['TIPO'] != "Individual") {

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'No se puede modificar (Pregunta múltiple).');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/formulario');
        }

        $data = [
            'TIPO'=> "Individual",
            'TITULO'=>  $this->request->getVar('titulo_pregunta'),
            'TIPO_INPUT' => $this->request->getVar('tipo_simple'),
            'ESTADO' => $this->request->getVar('estado_simple')
        ];

        if ($preguntaModel->update($aux, $data)){

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'Pregunta modificada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');
        } else {

            # Devuelve a Formulario con alerta bootstrap

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

        # Si la pregunta no es Múltiple devuelve sin realizar modificaciones

        if ($pregunta != "Múltiple") {

            $session-> setFlashData('status', 'No se puede modificar (Pregunta Simple).');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/formulario');
        }

        $data = [
            'TIPO'=> "Múltiple",
            'TITULO'=>  $this->request->getVar('titulo_pregunta_m'),
            'TIPO_INPUT' => $this->request->getVar('tipo_multiple'),
            'ESTADO' => $this->request->getVar('estado_multiple')
        ];

        if ($preguntaModel->update($aux, $data)){

            $total_opciones = $this->request->getVar('total_campo_m');

            /**
             * Si la pregunta posee opciones, elimina toda la información previa
             */

            if (! is_null($opciones) || ! empty($opciones)){ 
                foreach ($opciones as $opcion) {
                    $opcionesPMultipleModel->delete($opcion['ID_OPCIONES_PM']);
                }
            }

            /**
             * Se genera un for por cada opcion de la pregunta nueva
             * Para ser insertado en la tabla de OpcionesPMultiple
             */
            
            for ($i=1; $i <= $total_opciones; $i++) { 
                
                $opcion = $this->request->getVar('m_nuevo_'.$i);

                $insertar_opcion = [
                    'OPCION_PMULTIPLE' => $opcion,
                    'ID_PREGUNTA' => $aux
                ];

                $opcionesPMultipleModel->save($insertar_opcion);
            }

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'Pregunta modificada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/formulario');
        } else {

            # Devuelve a Formulario con alerta bootstrap

            $session-> setFlashData('status', 'No se pudo modificar.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return view('admin/convicatorias/error'); #('errors/admin/convocatoria') o redirect -> controlador -> error
        }  
    }
}