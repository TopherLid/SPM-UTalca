<?php

namespace App\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\PostulacionModel;
use App\Models\CarreraModel;
use App\Models\UniversidadModel;
use App\Models\ProgramaModel;
use App\Models\EstudianteModel;

class Notificacion extends BaseController 
{

    public function mailer($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }
            
        $email = \Config\Services::email();

        $convocatoriaModel = new ConvocatoriaModel();
        $postulacionModel = new PostulacionModel();
        $carreraModel = new CarreraModel();
        $universidadModel = new UniversidadModel();
        $programaModel = new ProgramaModel();
        $estudianteModel = new EstudianteModel();

        $convocatoria = $convocatoriaModel->find($aux);
        $postulaciones = $postulacionModel -> select('*')->where ('ID_CONVOCATORIA', $aux)->findAll();
        $programa = $programaModel -> find ($convocatoria['ID_PROGRAMA']);

        /**
         * Algoritmo para renombrar la postulación y selección dependiendo del
         * estado y la Universidad seleccionada dentro del Mail
         */

        foreach($postulaciones as $postulacion) {

            $estudiante = $estudianteModel->select('*')->where('ID_ESTUDIANTE', $postulacion['ID_ESTUDIANTE'])->first();
            $asunto = 'SPM Resultados Convocatoria: '.$convocatoria['NOMBRE'];

            if($postulacion['ESTADO']=="En espera" || $postulacion['ESTADO']=="Modificable" ){
                $seleccion = "Aún se encuentra en revisión, favor asistir a las oficinas de Relaciones Internacionales";
            } else {
                if($postulacion['ESTADO']=="Rechazado"){
                    $seleccion = 'Su postulación ha sido rechazada.';
                } else {
                    $universidad = $universidadModel->find($postulacion['SELECCION']);
                    $seleccion = $postulacion['ESTADO'].'<br>Universidad en la que ha sido seleccionado: '.$universidad['NOMBRE'];
                }
            }

            $footer = '<div style="padding-top:150px"><center><p> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center></div>';	

            $mensaje = view('template/email').'Solicitud n°: '.$postulacion['ID_POSTULACION'].'<br>Nombre: '.$estudiante['NOMBRE'].
            '<br>Matrícula: '.$estudiante['MATRICULA'].'<br> Estado postulación: '.$seleccion.$footer; 

            $email -> setTo($estudiante['EMAIL_INSTITUCIONAL']);
            $email -> setCC($postulacion['EMAIL_PERSONAL']);
            $email -> setFrom('pruebaSPM@utalca.cl', 'SPM Mailer');
            $email -> setSubject($asunto);
            $email -> setMessage($mensaje);
            $email -> send();
        }


        //return redirect()->to('admin/postulantes');
    }


    public function email(){

        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $aux = $this->request->getVar('id_notif');
            
        $email = \Config\Services::email();

        $convocatoriaModel = new ConvocatoriaModel();
        $postulacionModel = new PostulacionModel();
        $carreraModel = new CarreraModel();
        $universidadModel = new UniversidadModel();
        $programaModel = new ProgramaModel();
        $estudianteModel = new EstudianteModel();

        $convocatoria = $convocatoriaModel->find($aux);
        $postulaciones = $postulacionModel -> select('*')->where ('ID_CONVOCATORIA', $aux)->findAll();
        $programa = $programaModel -> find ($convocatoria['ID_PROGRAMA']);

        if ($convocatoria['NOTIFICACION']=="Si"){
            $session-> setFlashData('status', 'La notificación para la convocatoria ya ha sido realizada.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/postulantes');
        }

        foreach($postulaciones as $postulacion) {

            $estudiante = $estudianteModel->select('*')->where('ID_ESTUDIANTE', $postulacion['ID_ESTUDIANTE'])->first();
            $asunto = 'SPM Resultados Convocatoria: '.$convocatoria['NOMBRE'];

            if($postulacion['ESTADO']=="En espera" || $postulacion['ESTADO']=="Modificable" ){
                $seleccion = "Aún se encuentra en revisión, favor asistir a las oficinas de Relaciones Internacionales";
            } else {
                if($postulacion['ESTADO']=="Rechazado"){
                    $seleccion = 'Su postulación ha sido rechazada.';
                } else {
                    $universidad = $universidadModel->find($postulacion['SELECCION']);
                    $seleccion = $postulacion['ESTADO'].'<br>Universidad en la que ha sido seleccionado: '.$universidad['NOMBRE'];
                }
            }

            $footer = '<div style="padding-top:150px"><center><p> © 2022 SPM DESARROLLO CONJUNTO IIE Y RRII - UNIVERSIDAD DE TALCA </p></center></div>';	

            $mensaje = view('template/email').'Solicitud n°: '.$postulacion['ID_POSTULACION'].'<br>Nombre: '.$estudiante['NOMBRE'].
            '<br>Matrícula: '.$estudiante['MATRICULA'].'<br> Estado postulación: '.$seleccion.$footer; 

            $email -> setTo($estudiante['EMAIL_INSTITUCIONAL']);
            $email -> setCC($postulacion['EMAIL_PERSONAL']);
            $email -> setFrom('pruebaSPM@utalca.cl', 'SPM Mailer');
            $email -> setSubject($asunto);
            $email -> setMessage($mensaje);
            $email -> send();
        }

        $data = [
            'NOTIFICACION' => "Si"
        ];

        if ($convocatoriaModel->update($aux, $data)) {

            $session-> setFlashData('status', 'Notificación realizada correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/postulantes');

        } else {

            $session-> setFlashData('status', 'Ha ocurrido un error.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/postulantes');
        }
    }
}