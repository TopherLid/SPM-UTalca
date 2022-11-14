<?php

namespace App\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\ProgramaModel;
use App\Models\PaisModel;
use App\Models\UniversidadModel;
use App\Models\IdiomaModel;
use App\Models\CarreraModel;
use App\Models\PostulacionModel;

use App\Models\PreguntaConvocatoriaModel;

use App\Models\PreguntaModel;
use App\Models\OpcionesPMultipleModel;
use App\Models\RespuestaModel;

use App\Models\EstudianteModel;

use CodeIgniter\Files\File;

class Estudiante extends BaseController
{
    public function verificador()
    {
        $session = session();

        $sesion_creada = $session->has('id_estudiante');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $convocatoriaModel = new ConvocatoriaModel();
        $postulacionModel = new PostulacionModel();
        $programaModel = new ProgramaModel();
        $carreraModel = new CarreraModel();

        $convocatoria = $convocatoriaModel->select('*')->orderBy('ID_CONVOCATORIA', 'DESC')->first();
        
        $conv_check = is_null($convocatoria);

        if ($conv_check==true){
            return view('estudiante/proximamente');
        }

        $postulante = [
            'id_estudiante' => session()->get('id_estudiante'),
            'RUT' => session()->get('RUT'),
            'nombre' => session()->get('nombre'),
            'matricula' => session()->get('matricula'),
            'nacimiento' => session()->get('nacimiento'),
            'email' => session()->get('email'),
            'sct' => session()->get('sct'),
            'ramos_reprobados' => session()->get('ramos_reprobados'),
            'estudiante_regular' => session()->get('estudiante_regular'),
            'id_carrera' => session()->get('id_carrera'),
            'carrera' => session()->get('carrera'),
            'deuda_dafe'=>session()->get('deuda'),
            'deuda_biblioteca'=>session()->get('deuda_biblioteca'),
        ];

        $postulacion_check = $postulacionModel->select('*')->where('ID_CONVOCATORIA', $convocatoria['ID_CONVOCATORIA'])->findAll();
        $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
        $programas = $programaModel->findAll();

        $ver = count($postulacion_check);

        $postulacion_multiple = false;

        if ($convocatoria['ESTADO']!="Activa"){
            return view('estudiante/fuera_plazo');
        } 

        if ($ver!=0){
            //$postulacion_multiple = true; //bypass para multiples postulaciones
        }

        $carrera = $carreraModel->find($postulante['id_carrera']);
        $max_creditos = ( $convocatoria['MAX_CREDITO_SCT'] / 100 );
        $creditos_carrera = ($carrera['CREDITOS'] * $max_creditos );

        if ($postulante['sct']>=$convocatoria['MIN_CREDITO_SCT'] && $postulante['sct']<=$creditos_carrera && $postulante['estudiante_regular']=="Si" && $postulacion_multiple==false && $postulante['ramos_reprobados']<=$convocatoria['RAMOS_REPROBADOS'])
        {
            $data=array('postulante'=>$postulante, 'programa'=>$programa, 'programas'=>$programas);

            $session->set('estudiante_habilitado', 'Habilitado');
            $session->set('id_convocatoria', $convocatoria['ID_CONVOCATORIA']);
            
            return view('estudiante/verificador/correcto', $data);

        } else {

            $problema = array();
            
            if ($postulacion_multiple = true){
                array_push($problema, "Usted ya tiene una postulación previamente realizada.");
            }

            if ($postulante['deuda_dafe']=="Si"){
                array_push($problema, "Su situación no se encuentra regularizada (deuda con las cuotas universitarias).");
            }

            if ($postulante['deuda_biblioteca']=="Si"){
                array_push($problema, "Su situación no se encuentra regularizada (deuda con las cuotas universitarias).");
            }
            
            if ($postulante['ramos_reprobados']>$convocatoria['RAMOS_REPROBADOS']){
                array_push($problema, "Usted posee ".$postulante['ramos_reprobados']." ramos reprobados (el máximo de ramos reprobados para esta postulación es: ".$convocatoria['RAMOS_REPROBADOS'].").");
            }
            
            if ($postulante['sct']<$convocatoria['MIN_CREDITO_SCT']){
                array_push($problema, "Creditos inferiores al mínimo de la convocatoria (mínimo: ".$convocatoria['MIN_CREDITO_SCT'].", sus créditos aprobados: ".$postulante['sct'].").");
            }

            if ($postulante['sct']>$creditos_carrera){
                array_push($problema, "Superas la cantidad de créditos de la convocatoria (Máximo: ".$creditos_carrera.", sus créditos aprobados: ".$postulante['sct'].").");
            }

            if ($postulante['estudiante_regular']!="Si"){
                array_push($problema, "Usted no es alumno regular.");
            }

            $data=array('postulante'=>$postulante, 'programa'=>$programa, 'problema'=>$problema);

            $session->set('estudiante_habilitado', 'Rechazado');

            return view('estudiante/verificador/error', $data);
        }
    }

    public function formulario()
    {
        $session = session();
        $sesion_creada = $session->has('id_estudiante');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $estado_estudiante = session()->get('estudiante_habilitado');

        if($estado_estudiante != "Habilitado"){
            return redirect()->to('estudiante/validacion');
        }

        $postulante = [
            'id_estudiante' => session()->get('id_estudiante'),
            'RUT' => session()->get('RUT'),
            'nombre' => session()->get('nombre'),
            'matricula' => session()->get('matricula'),
            'nacimiento' => session()->get('nacimiento'),
            'email' => session()->get('email'),
            'sct' => session()->get('sct'),
            'estudiante_regular' => session()->get('estudiante_regular'),
            'id_carrera' => session()->get('id_carrera'),
            'carrera' => session()->get('carrera'),
            'deuda'=>session()->get('deuda'),
            'id_convocatoria'=>session()->get('id_convocatoria'),
        ];

        $convocatoriaModel = new ConvocatoriaModel();
        $convocatoria = $convocatoriaModel->find($postulante['id_convocatoria']); //pasar query a model

        if (is_null($convocatoria)){
            return view('estudiante/proximamente');
        }

        $carreraModel = new CarreraModel();
        $programaModel = new ProgramaModel();
        $universidadModel = new UniversidadModel();
        $paisModel = new PaisModel();
        $idiomaModel = new IdiomaModel();
        
        $preguntaModel = new PreguntaModel();
        $opcionesPMultipleModel = new OpcionesPMultipleModel();
        $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

        $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);
        $universidades_base = $universidadModel->orderBy('ID_PAIS', 'ASC')->findAll(); 
        #$universidades = $detalleUniversidadModel -> select('*')->where('ID_PROGRAMA', $programa['ID_PROGRAMA'])->findAll();
        $idiomas = $idiomaModel->select('*')->where('ESTADO', 'Activo')->findAll();

        $preguntas_adicionales = $preguntaConvocatoriaModel->select('*')->where('ID_CONVOCATORIA', $postulante['id_convocatoria'])->findAll();

        $contador_universidad = 0;

        foreach ($universidades_base as $universidad){
            $pais = $paisModel ->find($universidad['ID_PAIS']);

            $cambiar[$contador_universidad]=[
                'ID_UNIVERSIDAD' => $universidad['ID_UNIVERSIDAD'],
                'NOMBRE' => $universidad['NOMBRE'],
                'ID_PAIS' => $pais['NOMBRE']
            ];
            $universidades = array_replace($universidades_base, $cambiar);

            $contador_universidad++;
        }

        $preguntas_lista = true;

        if (empty($preguntas_adicionales) || is_null($preguntas_adicionales)) {
            $preguntas_lista = false;
            $preguntas = null;
            
        } else {
            $contador_pregunta = 0;

            foreach ($preguntas_adicionales as $p_a){
                $cont_labels=1;

                $pregunta_finder = $preguntaModel -> find($p_a['ID_PREGUNTA']);

                if ($pregunta_finder['TIPO']=="Simple"){
                    
                    $cambiar_pregunta[$contador_pregunta]=[
                        'ID_PREGUNTA' => $pregunta_finder['ID_PREGUNTA'],
                        'TIPO'=> $pregunta_finder['TIPO'],
                        'TITULO'=> $pregunta_finder['TITULO'],
                        'TIPO_INPUT' => $pregunta_finder['TIPO_INPUT']
                    ];

                    $preguntas = array_replace($preguntas_adicionales, $cambiar_pregunta);

                }

                if ($pregunta_finder['TIPO']=="Múltiple") {

                    $opciones = $opcionesPMultipleModel->select('*')->where('ID_PREGUNTA', $p_a['ID_PREGUNTA'])->findAll();

                    $cambiar_pregunta[$contador_pregunta]=[
                        'ID_PREGUNTA' => $pregunta_finder['ID_PREGUNTA'],
                        'TIPO'=> $pregunta_finder['TIPO'],
                        'TITULO'=> $pregunta_finder['TITULO'],
                        'TIPO_INPUT' => $pregunta_finder['TIPO_INPUT']
                    ];

                    foreach($opciones as $opcion){

                        $cambiar_pregunta[$contador_pregunta] += ['opcion_'.$cont_labels => $opcion['OPCION_PMULTIPLE']];
                        $cont_labels++;

                    }

                    $cambiar_pregunta[$contador_pregunta] += ['contador_opciones'=>$cont_labels];
                    $preguntas = array_replace($preguntas_adicionales, $cambiar_pregunta);
                }
 
                $contador_pregunta++;
            }
        }

        $data=array('universidad'=>$universidades, 'programa'=>$programa, 'postulante'=>$postulante, 'idiomas'=>$idiomas, 
        'preguntas'=>$preguntas, 'preguntas_lista'=>$preguntas_lista);

        return view('estudiante/ticket/formulario', $data);
    }

    public function guardar()
    {
        $session = session();

        if ($session->has('id_estudiante')){
    
            $postulacionModel = new PostulacionModel();
            $universidadModel = new UniversidadModel();
            $carreraModel = new CarreraModel();
            $estudianteModel = new EstudianteModel();
            $preguntaModel = new PreguntaModel();
            $respuestaModel = new RespuestaModel();
            $opcionesPMultipleModel = new OpcionesPMultipleModel();
            $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

            $postulante = [
                'id_estudiante' => session()->get('id_estudiante'),
                'id_detalle_postulante' => session()->get('id_detalle_postulante'),
                'RUT' => session()->get('RUT'),
                'nombre' => session()->get('nombre'),
                'matricula' => session()->get('matricula'),
                'nacimiento' => session()->get('nacimiento'),
                'email' => session()->get('email'),
                'sct' => session()->get('sct'),
                'estudiante_regular' => session()->get('estudiante_regular'),
                'id_carrera' => session()->get('id_carrera'),
                'carrera' => session()->get('carrera'),
                'deuda'=>session()->get('deuda'),
                'id_convocatoria'=>session()->get('id_convocatoria'),
            ];

            $datos = [
                'NACIONALIDAD'=> $this->request->getVar('nacionalidad'),
                'N_TELEFONO'=>$this->request->getVar('telefono'),
                'EMAIL_PERSONAL'=>$this->request->getVar('email_personal'),
                'NIVEL_INGLES'=> $this->request->getVar('nivel_ingles'),
                'IDIOMA_2'=> $this->request->getVar('idioma_sec'),
                '1RA_OPCION'=>$this->request->getVar('1ra_opcion'),
                '2DA_OPCION'=> $this->request->getVar('2da_opcion'),
                '3RA_OPCION'=> $this->request->getVar('3ra_opcion'),
                'ID_ESTUDIANTE'=> $postulante['id_estudiante'],  
                'ID_CONVOCATORIA' => $postulante['id_convocatoria']
            ];

            /*

            $cv = $this->request->getFile('cv');

            if (! $cv->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $cv->store($postulante['id_convocatoria'].'/'.$postulante['RUT'], 'cv.pdf');
                $data = ['uploaded_flleinfo' => new File($filepath)];
            }

            $antecedente = $this->request->getFile('antecedente');

            if (! $antecedente->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $antecedente->store($postulante['id_convocatoria'].'/'.$postulante['RUT'], 'antecedentes.pdf');
                $data = ['uploaded_flleinfo' => new File($filepath)];
            }

            $cinteres = $this->request->getFile('cinteres');
            
            if (! $cinteres->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $cinteres->store($postulante['id_convocatoria'].'/'.$postulante['RUT'], 'c_interes.pdf');
                $data = ['uploaded_flleinfo' => new File($filepath)];
            }

            */
            
            if ($postulacionModel->insert($datos)){

                $postulacion = $postulacionModel->select('*')->where('ID_ESTUDIANTE', $datos['ID_ESTUDIANTE'])->orderBy('ID_POSTULACION', 'DESC')->first();

                $universidad1=$universidadModel->find($datos['1RA_OPCION']);
                $universidad2=$universidadModel->find($datos['2DA_OPCION']);
                $universidad3=$universidadModel->find($datos['3RA_OPCION']);
                
                $detalle_pregunta = $preguntaConvocatoriaModel->select('*')->where('ID_CONVOCATORIA', $postulacion['ID_CONVOCATORIA'])->findAll();

                $contador_respuestas = $this->request->getVar('respuestas_cant');

                $i=1;
                foreach ($detalle_pregunta as $dp){

                    $pregunta = $preguntaModel -> find($dp['ID_PREGUNTA']);

                    if ($pregunta['TIPO_INPUT']=="Checkbox"){

                        $checkbox_respuesta = implode(", " , $_POST['pregunta_'.$i]);

                        $insertor_respuestas = [
                            'RESPUESTA'=> $checkbox_respuesta,
                            'ID_PREGUNTA' => $dp['ID_PREGUNTA'],
                            'ID_POSTULACION' => $postulacion['ID_POSTULACION']
                        ];
                    } else { 
                        $insertor_respuestas = [
                            'RESPUESTA'=> $this->request->getVar('pregunta_'.$i),
                            'ID_PREGUNTA' => $dp['ID_PREGUNTA'],
                            'ID_POSTULACION' => $postulacion['ID_POSTULACION']
                        ];
                    }
                    $respuestaModel->insert($insertor_respuestas);
                    $i++;
                }

                

                $cv = $this->request->getFile('cv');

                if (! $cv->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads/' . $cv->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cv.pdf');
                    $data = ['uploaded_flleinfo' => new File($filepath)];
                }
        
                $interes = $this->request->getFile('cinteres');
        
                if (! $interes->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads/' . $interes->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'interes.pdf');
                    $data = ['uploaded_flleinfo' => new File($filepath)];
                }
        
                $antecedentes = $this->request->getFile('antecedente');
        
                if (! $antecedentes->hasMoved()) {
                    $filepath = WRITEPATH . 'uploads/' . $antecedentes->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'antecedentes.pdf');
                    $data = ['uploaded_flleinfo' => new File($filepath)];
                }

                if ($postulante['deudor'==1]) {
                    
                    $verificador = $this->request->getFile('verificador');
            
                    if (! $verificador->hasMoved()) {
                        $filepath = WRITEPATH . 'uploads/' . $antecedentes->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'verificador.pdf');
                        $data = ['uploaded_flleinfo' => new File($filepath)];
                    }
                }

                

                $session-> setFlashData('id_postulacion', $postulacion['ID_POSTULACION']);
                
                return redirect()->to('postulacion/correcto/'); 

            } else {
                return view('estudiante/ticket/error');
            }
        } else {
            return view('template/403');
        }
    }

    public function correcto()
    {
        $session = session(); 

        if (! $session->has('id_postulacion')){

            return redirect()->to('estudiante/validacion/'); 
        }

            $id_postulacion = session()->get('id_postulacion');


            $postulacionModel = new PostulacionModel();
            $universidadModel = new UniversidadModel();

            $idiomaModel = new IdiomaModel();

            $postulante = [
                'id_estudiante' => session()->get('id_estudiante'),
                'id_detalle_postulante' => session()->get('id_detalle_postulante'),
                'RUT' => session()->get('RUT'),
                'nombre' => session()->get('nombre'),
                'matricula' => session()->get('matricula'),
                'nacimiento' => session()->get('nacimiento'),
                'email' => session()->get('email'),
                'sct' => session()->get('sct'),
                'estudiante_regular' => session()->get('estudiante_regular'),
                'id_carrera' => session()->get('id_carrera'),
                'carrera' => session()->get('carrera'),
                'deuda'=>session()->get('deuda'),
                'id_convocatoria'=>session()->get('id_convocatoria'),
            ];

            $postulacion = $postulacionModel->find($id_postulacion);

            $idioma = $idiomaModel->find($postulacion['IDIOMA_2']);

            $universidad1=$universidadModel->find($postulacion['1RA_OPCION']);
            $universidad2=$universidadModel->find($postulacion['2DA_OPCION']);
            $universidad3=$universidadModel->find($postulacion['3RA_OPCION']);

            $carrera = [
                'ID_CARRERA' => $postulante['id_carrera'],
                'NOMBRE' => $postulante['carrera']
            ];

            $info = array ('postulante'=>$postulante, 'carrera'=>$carrera, 'universidad1'=>$universidad1, 'universidad2'=>$universidad2, 
            'universidad3'=>$universidad3, 'idioma'=>$idioma, 'postulacion'=>$postulacion);
            return view('estudiante/ticket/correcto', $info);
        
    }

    public function historial(){
        $session = session();

        if ($session->has('id_estudiante')){

            $postulacionModel = new PostulacionModel();

            $convocatoriaModel = new ConvocatoriaModel();
            $programaModel = new ProgramaModel();
            $idiomaModel = new IdiomaModel();
            $universidadModel = new UniversidadModel();
            $carreraModel = new CarreraModel();

            $postulante = [
                'id_detalle_postulante' => session()->get('id_detalle_postulante'),
                'id_estudiante' => session()->get('id_estudiante'),
                'RUT' => session()->get('RUT'),
                'nombre' => session()->get('nombre'),
                'matricula' => session()->get('matricula'),
                'nacimiento' => session()->get('nacimiento'),
                'email' => session()->get('email'),
                'sct' => session()->get('sct'),
                'estudiante_regular' => session()->get('estudiante_regular'),
                'id_carrera' => session()->get('id_carrera'),
                'carrera' => session()->get('carrera'),
                'deuda'=>session()->get('deuda'),
                'id_convocatoria'=>session()->get('id_convocatoria'),
            ];
            
            $postulaciones_base = $postulacionModel->select('*')->where('ID_ESTUDIANTE', $postulante['id_estudiante'])->orderBy('ID_POSTULACION', 'DESC')->findAll();

            if (is_null($postulaciones_base) || empty($postulaciones_base)){

                $postulaciones = false;

            } else {

                $contador = 0;

                foreach ($postulaciones_base as $postulacion) {

                    $convocatoria = $convocatoriaModel ->find($postulacion['ID_CONVOCATORIA']);
                    $programa = $programaModel -> find ($convocatoria['ID_PROGRAMA']);
                    $idioma = $idiomaModel -> find($postulacion['IDIOMA_2']);

                    $universidad1 = $universidadModel->find($postulacion['1RA_OPCION']);
                    $universidad2 = $universidadModel->find($postulacion['2DA_OPCION']);
                    $universidad3 = $universidadModel->find($postulacion['3RA_OPCION']);

                    if($postulacion['SELECCION']==0){

                        if ($postulacion['ESTADO']=="Rechazado"){
                            $seleccion = "Rechazada";
                        }

                        if ($postulacion['ESTADO']=="Modificable") {
                            $seleccion = "Modificable";
                        }
                        if ($postulacion['ESTADO']=="En espera"){
                            $seleccion = "En espera";
                        }

                    } else {
                        $seleccion_u = $universidadModel->find($postulacion['SELECCION']);
                        $seleccion = $seleccion_u['NOMBRE'];
                    }

                    $cambiar[$contador] = [
                        'ID_POSTULACION' => $postulacion ['ID_POSTULACION'],
                        'CONVOCATORIA' => $convocatoria['NOMBRE'],
                        'PROGRAMA' => $programa['NOMBRE'],
                        'ESTADO' => $postulacion['ESTADO'],
                        'SELECCION' => $seleccion
                    ];

                    $postulaciones = array_replace($postulaciones_base, $cambiar);
                    $contador++;
                }
            }

            $carrera = [
                'ID_CARRERA' => $postulante['id_carrera'],
                'NOMBRE' => $postulante['carrera']
            ];
            
            $data = array('postulante'=>$postulante, 'postulaciones'=>$postulaciones, 'carrera'=>$carrera);

            return view('estudiante/historial', $data);
        } else {
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso
        }
    }

    public function individual($aux){

        $session = session();

        if ($session->has('id_estudiante')){

            $postulante = [
                'id_estudiante' => session()->get('id_estudiante'),
                'RUT' => session()->get('RUT'),
                'nombre' => session()->get('nombre'),
                'matricula' => session()->get('matricula'),
                'nacimiento' => session()->get('nacimiento'),
                'email' => session()->get('email'),
                'sct' => session()->get('sct'),
                'estudiante_regular' => session()->get('estudiante_regular'),
                'id_carrera' => session()->get('id_carrera'),
                'carrera' => session()->get('carrera'),
                'deuda'=>session()->get('deuda'),
                'id_convocatoria'=>session()->get('id_convocatoria'),
            ];

            $postulacionModel = new PostulacionModel();
            $carreraModel = new CarreraModel();
            $programaModel = new ProgramaModel();
            $universidadModel = new UniversidadModel();
            $convocatoriaModel = new ConvocatoriaModel();
            $paisModel = new PaisModel();

            $preguntaModel = new PreguntaModel();
            $respuestaModel = new RespuestaModel();
            $preguntaConvocatoriaModel = new PreguntaConvocatoriaModel();

            $postulacion = $postulacionModel->find($aux);
            $carrera = $carreraModel->find($postulante['id_carrera']);
            $convocatoria = $convocatoriaModel->find($postulacion['ID_CONVOCATORIA']);
            $programa = $programaModel->find($convocatoria['ID_PROGRAMA']);

            $universidades_base = $universidadModel->findAll();
            $paises= $paisModel->findAll(); 

            $contador = 0;

            foreach ($universidades_base as $universidad){
                $pais = $paisModel -> find($universidad['ID_PAIS']);
                $cambiar[$contador]=[
                    'ID_UNIVERSIDAD' => $universidad['ID_UNIVERSIDAD'],
                    'NOMBRE' => $universidad['NOMBRE'],
                    'ID_PAIS' => $pais['NOMBRE']
                ];
                $universidades = array_replace($universidades_base, $cambiar);
                $contador++;
            }

            $universidad1 = $universidadModel->find($postulacion['1RA_OPCION']);
            $universidad2 = $universidadModel->find($postulacion['2DA_OPCION']);
            $universidad3 = $universidadModel->find($postulacion['3RA_OPCION']);
            $seleccion  = $universidadModel->find($postulacion['SELECCION']);

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

            $data = array ('postulante'=>$postulante, 'postulacion'=>$postulacion, 'carrera'=>$carrera, 'convocatoria'=>$convocatoria, 'programa'=>$programa, 'preguntas'=>$preguntas,
            'universidad1'=>$universidad1, 'universidad2'=>$universidad2, 'universidad3'=>$universidad3, 'seleccion'=>$seleccion, 'universidades'=>$universidades);
            
            return view('estudiante/historial_especifico', $data);
        } else {
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso
        }
    }

    public function modificar(){

        $session = session();

        if ($session->has('id_estudiante')){

            $postulante = [
                'id_estudiante' => session()->get('id_estudiante'),
                'RUT' => session()->get('RUT'),
                'nombre' => session()->get('nombre'),
                'matricula' => session()->get('matricula'),
                'nacimiento' => session()->get('nacimiento'),
                'email' => session()->get('email'),
                'sct' => session()->get('sct'),
                'estudiante_regular' => session()->get('estudiante_regular'),
                'id_carrera' => session()->get('id_carrera'),
                'carrera' => session()->get('carrera'),
                'deuda'=>session()->get('deuda'),
                'id_convocatoria'=>session()->get('id_convocatoria'),
            ];

            $postulacionModel = new PostulacionModel();
            $carreraModel = new CarreraModel();
            $programaModel = new ProgramaModel();
            $universidadModel = new UniversidadModel();
            $convocatoriaModel = new ConvocatoriaModel();

            $id_postulacion = $this->request->getVar('id_postulacion');
            $url="estudiante/historial/".$id_postulacion;

            $data = [
                'NACIONALIDAD'=>$this->request->getVar('nacionalidad'),
                'N_TELEFONO'=>$this->request->getVar('telefono'),
                'EMAIL_PERSONAL'=>$this->request->getVar('email_personal'),
                'NIVEL_INGLES'=> $this->request->getVar('nivel_ingles'),
                'IDIOMA_2'=> $this->request->getVar('idioma_sec'), //$s_i
                '1RA_OPCION'=>$this->request->getVar('1ra_opcion'),
                '2DA_OPCION'=> $this->request->getVar('2da_opcion'),
                '3RA_OPCION'=> $this->request->getVar('3ra_opcion'),   
                'ESTADO' => "En espera" 
            ];
            
            if ($postulacionModel->update($id_postulacion, $data)){

                #modificar preguntas adicionales

                $session-> setFlashData('status', 'Postulación modificada correctamente.');
                $session-> setFlashData('status_action', 'alert-success');
                $session-> setFlashData('status_alert', '¡Correcto!');

                return redirect()->to($url);
            } else {
                $session-> setFlashData('status', 'La postulación no ha sido modificada.');
                $session-> setFlashData('status_action', 'alert-danger');
                $session-> setFlashData('status_alert', '¡Error!');

               return redirect()->to($url); #('errors/admin/convocatoria') o redirect -> controlador -> error
            }
            
        }
        return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso
    }

    public function logout()
    {
        $session = session();
        if ($session->has('id_estudiante')){
            /**
             * Elimina la sesión PHP y redirecciona al sitio de la U
             */
            $session->destroy();
            return redirect()->to('https://www.utalca.cl');
        }
        return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso
    }

}