<?php

namespace App\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\ProgramaModel;
use App\Models\PostulacionModel;
use App\Models\PreguntaModel;
use App\Models\PreguntaConvocatoriaModel;

use CodeIgniter\I18n\Time;

class Convocatoria extends BaseController
{

    public function index()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        /**
         * Carga de Models
         */

        $convocatoriaModel = new ConvocatoriaModel();
        $programaModel = new ProgramaModel();
        $postulacionModel = new PostulacionModel();
        $preguntasModel = new PreguntaModel();

        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];

        
        $convocatorias = $convocatoriaModel->orderBy('ID_CONVOCATORIA', 'DESC')->paginate(25);
        
        if(empty($convocatorias)){
            $convocatorias = false;
        }

        /**
         * La función paginate muestra un máximo de 25 datos en la tabla, generando un botón para ver los sgtes 25 datos
         */
        
        $paginador = $convocatoriaModel->pager;
        $postulaciones = $postulacionModel-> findAll();
        $programas = $programaModel->where('ESTADO', 'Activo')->findAll(); 
        $preguntas = $preguntasModel->where('ESTADO', 'Activo')->findAll();

        # En caso de ser vacía retorna False para ser trabajada en la vista

        if(empty($programas) || is_null($programas)){
            $programas = false;
        }

        if(empty($idiomas) || is_null($idiomas)){
            $idiomas = false;
        }

        if(empty($preguntas) || is_null($preguntas)){
            $preguntas = false;
        } 

        $posicion=0;

        foreach ($convocatorias as $convocatoria){
            $contador = count($postulacionModel->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll());

            $convocatorias[$posicion] += ['CONTADOR' => $contador];
            $posicion++;
        }

        /**
         * Toma la información y la guarda en el arreglo data, el cual, es mostrado en la vista
         */
        
        $data=array('convocatorias'=>$convocatorias, 'programas'=>$programas, 'preguntas'=>$preguntas,  'usuario'=>$usuario, 'paginador'=>$paginador); 
            
        return view('admin/convocatorias/vista', $data);
    }

    public function crear()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

        /**
         * las preguntas
         */

        $id_convocatoria = strip_tags($this->request->getVar('id_convocatoria'));
        $nombre_conv = strip_tags($this->request->getVar('nombre_convocatoria'));
        $inicio_conv = strip_tags($this->request->getVar('f_inicio'));
        $fin_conv = strip_tags($this->request->getVar('f_fin'));
        $min_sct = strip_tags($this->request->getVar('min_sct_creditos'));
        $max_sct = strip_tags($this->request->getVar('max_sct_creditos'));
        $ramos = strip_tags($this->request->getVar('ramos_reprobados'));
        $id_programa = strip_tags($this->request->getVar('tipo_convocatoria'));

        $data = [
            'NOMBRE'=> $nombre_conv ,
            'FECHA_INICIO'=>$inicio_conv ,
            'FECHA_FIN'=>$fin_conv ,
            'MIN_CREDITO_SCT'=>$min_sct ,
            'MAX_CREDITO_SCT'=> $max_sct ,
            'RAMOS_REPROBADOS' => $ramos,
            'ID_PROGRAMA'=> $id_programa
        ];

        /**
         * Insersión de datos en tabla CONVOCATORIA
         */

        if ($convocatoriaModel->save($data)){

            # Genera alerta y devuelve a Convocatoria

            $session-> setFlashData('status', 'Convocatoria creada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            $convocatoria_actual = $convocatoriaModel -> orderBy('ID_CONVOCATORIA', 'DESC')-> first();

            /**
             * Insersión del formulario 
             * SIEMPRE Y CUANDO
             * existan preguntas seleccionadas en la checkbox
             */

            if (! is_null($this->request->getVar('pregunta')) || ! empty($this->request->getVar('pregunta'))){
                
                foreach ($_POST['pregunta'] as $valor) {

                    $datos_pregunta = [
                        'ID_PREGUNTA' => $valor,
                        'ID_CONVOCATORIA' => $convocatoria_actual['ID_CONVOCATORIA']

                    ];
                    $preguntaConvocatoriaModel->save($datos_pregunta); 
                }
            }

            return redirect()->to('admin/convocatorias');

        } else {

            # Genera alerta y devuelve a Convocatoria

            $session-> setFlashData('status', 'La convocatoria no ha sido creada.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/convocatorias');
        }
    }

    public function modificar()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();

        $aux = $this->request->getVar('id_conv');
        $nombre_conv = strip_tags($this->request->getVar('nombre_convocatoria'));

        # fechas oracle

        $f_inicio = $this->request->getVar('f_inicio');
        $inicio_convocatoria = date("d/m/Y", strtotime($f_inicio));

        $f_fin = $this->request->getVar('f_fin');
        $fin_convocatoria = date("d/m/Y", strtotime($f_fin));

        $min_sct = strip_tags($this->request->getVar('min_sct_creditos'));
        $max_sct = strip_tags($this->request->getVar('max_sct_creditos'));
        $ramos = strip_tags($this->request->getVar('ramos_reprobados'));
        $id_programa = strip_tags($this->request->getVar('tipo_convocatoria'));

        $data = [
            'NOMBRE'=> $nombre_conv, 
            'FECHA_INICIO'=>$inicio_convocatoria,
            'FECHA_FIN'=>$fin_convocatoria,
            'ESTADO'=>$this->request->getVar('estado_convocatoria'),
            'MIN_CREDITO_SCT'=>$min_sct,
            'MAX_CREDITO_SCT'=>$max_sct,
            'RAMOS_REPROBADOS'=>$ramos,
            'ID_PROGRAMA'=>$id_programa
        ];

        if ($convocatoriaModel->update($aux, $data)){

            # Genera alerta y devuelve a Convocatoria
            
            $session-> setFlashData('status', 'Convocatoria modificada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/convocatorias');
        } else {

            # Genera alerta y devuelve a Convocatoria

            $session-> setFlashData('status', 'La convocatoria no ha sido modificada.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/convocatorias'); #('errors/admin/convocatoria') o redirect -> controlador -> error
        }  
    }

    /**
     * Función de vista específica de las convocatorias a través del ID, usada en el dashboard inicial
     */

    public function vista($aux)
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

        $convocatoriaModel = new ConvocatoriaModel();
        $programaModel = new ProgramaModel();
        $postulacionModel = new PostulacionModel();
        $preguntaModel = new PreguntaModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

        $convocatoria = $convocatoriaModel->find($aux);

        /**
         * if $convocatoria is_null -> redirecto a raiz
         *  con flashdata de que no existe la convocatoria a la que intenta ingresar
         */
        
        if (is_null($convocatoria) || empty($convocatoria)) {

            # Genera alerta y devuelve a Convocatoria
            
            $session-> setFlashData('status', 'La convocatoria no existe.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');
            
            return redirect()->to('admin/convocatorias');
        }
        
        $preguntas = $preguntaModel->findAll();
        
        $postulaciones = $postulacionModel->select('*')->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll();
        $programa = $programaModel->select('*')->where('ID_PROGRAMA', $convocatoria['ID_PROGRAMA'])->first();

        $contador_postulaciones = count($postulaciones);

        if(empty($preguntas) || is_null($preguntas)){
            $preguntas = false;
        }

        $pregunta_asociada = $preguntaConvocatoriaModel->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll();

        if (empty($pregunta_asociada || is_null($pregunta_asociada))){
            $pregunta_asignada=false;
        } else {
            $contador = 0;
            foreach($pregunta_asociada as $pa){

                $pregunta = $preguntaModel->find($pa['ID_PREGUNTA']);

                $cambiar[$contador] = [
                    'NOMBRE' => $pregunta['TITULO'],
                    'TIPO' => $pregunta['TIPO_INPUT']
                ];

                $pregunta_asignada = array_replace($pregunta_asociada, $cambiar);

                $contador++;
            }
        }

        $data=array('usuario'=>$usuario, 'convocatoria'=>$convocatoria, 'preguntas'=>$preguntas, 'programa'=>$programa, 'pregunta_asignada'=>$pregunta_asignada);

        return view('admin/convocatorias/individual', $data);
    }

    public function modificar_preguntas()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

        $id_convocatoria = $this->request->getVar('id_conv');
        $convocatoria = $convocatoriaModel->find($id_convocatoria);
        $preguntas_asociadas = $preguntaConvocatoriaModel ->select('*')->where('ID_CONVOCATORIA', $id_convocatoria)->findAll();

        /**
         * Algoritmo de modificación
         * Si encuentra que la convocatoria no tiene preguntas, ni se han seleccionado devuelve
         * Si encuentra que la convocatoria tiene, pero no hay seleccionadas las elimina
         * Si encuentra, elimina y después añade las preguntas asociadas
         */

        if (is_null($this->request->getVar('pregunta'))){

            if($is_null($preguntas_asociadas) || empty($preguntas_asociadas)){

                # Genera alerta y devuelve a Convocatoria

                $session-> setFlashData('status', 'El formulario de la convocatoria sigue sin preguntas.');
                $session-> setFlashData('status_action', 'alert-success');
                $session-> setFlashData('status_alert', '¡Correcto!');

                return redirect()->to('admin/convocatorias');

            } else {

                foreach ($preguntas_asociadas as $pa){
                    $preguntaConvocatoriaModel->delete($pa['ID_DETALLE_PREGUNTA']);
                }

                # Genera alerta y devuelve a Convocatoria

                $session-> setFlashData('status', 'Se han eliminado las preguntas del formulario.');
                $session-> setFlashData('status_action', 'alert-success');
                $session-> setFlashData('status_alert', '¡Correcto!');

                return redirect()->to('admin/convocatorias');
            }
        }

        foreach ($preguntas_asociadas as $preg_a_borrar){
            $preguntaConvocatoriaModel->delete($preg_a_borrar['ID_DETALLE_PREGUNTA']);
        }
        
        foreach ($_POST['pregunta'] as $valor) {

            $pregunta = $preguntaModel -> find($valor);
            $datos_pregunta = [
                'ID_PREGUNTA' => $valor,
                'ID_CONVOCATORIA' => $convocatoria_actual['ID_CONVOCATORIA']
            ];
            $preguntaConvocatoriaModel->save($datos_pregunta);  
        }

        # Genera alerta y devuelve a Convocatoria

        $session-> setFlashData('status', 'Se han modificado las preguntas del formulario.');
        $session-> setFlashData('status_action', 'alert-success');
        $session-> setFlashData('status_alert', '¡Correcto!');

        return redirect()->to('admin/convocatorias');
    }

    public function eliminar()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

        $id_convocatoria = $this->request->getVar('id_conv');
        $preguntas_asociadas = $preguntaConvocatoriaModel ->select('*')->where('ID_CONVOCATORIA', $id_convocatoria)->findAll();

        $convocatoria = $convocatoriaModel->find($id_convocatoria);

        /**
         * Siempre y cuando la convocatoria tenga estado "Próximamente" puede ser eliminada
         * Después de verificarlo, verifica si existe asociación a preguntas
         * En casod e existir, las elimina
         */

        if ($convocatoria['ESTADO']=="Próximamente"){
            $checker_db = is_null($preguntaConvocatoriaModel);
            if($checker_db==false){
                foreach ($preguntas_asociadas as $pa){
                    $preguntaConvocatoriaModel->delete($pa['ID_DETALLE_PREGUNTA']);
                }
            } 

            if ($convocatoriaModel->delete($id_convocatoria)){

                # Genera alerta y devuelve a Convocatoria

                $session-> setFlashData('status', 'Convocatoria eliminada correctamente.');
                $session-> setFlashData('status_action', 'alert-success');
                $session-> setFlashData('status_alert', '¡Correcto!');

                return redirect()->to('admin/convocatorias');
            } else {

                # Genera alerta y devuelve a Convocatoria

                $session-> setFlashData('status', 'Ha ocurrido un error inesperado.');
                $session-> setFlashData('status_action', 'alert-danger');
                $session-> setFlashData('status_alert', '¡Error!');

                return redirect()->to('admin/convocatorias');
            }

        } else {

            # Genera alerta y devuelve a Convocatoria

            $session-> setFlashData('status', 'El estado de la convocatoria ha cambiado.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/convocatorias');
        }
    }
    
}