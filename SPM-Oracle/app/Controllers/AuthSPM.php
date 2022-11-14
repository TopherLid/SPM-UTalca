<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\AdministrativoModel;
use App\Models\EstudianteModel;
use App\Models\CarreraModel;

class AuthSPM extends BaseController
{
    public function inicio(){

        $session = session();

        if($session->has('id_estudiante')){
            return redirect()->to('estudiante/validacion');
        }

        if($session->has('id_administrativo')){
            return redirect()->to('admin');
        }

        return view('login_impostor');
    }


    public function validador(){

        $session = session();

        /**
         * Crea la sesión en el sistema, y redirecciona al apartado correspondiente
         * estudiante -> Controlador: Estudiante
         * Administrativo -> Controlador: Administrativo
         */

        $usuarioModel = new UsuarioModel();

        $usr = $this->request->getVar('login');
        $pw = $this->request->getVar('pw');

        $usuario = $usuarioModel->find($usr);

        if (is_null($usuario) || empty($usuario)){

            $session-> setFlashData('estado', 'El usuario no existe, intente nuevamente.');
            return redirect()->to('/');
        }

        $administrativoModel = new AdministrativoModel();
        $estudianteModel = new EstudianteModel();
        $carreraModel = new CarreraModel();

        if ($usuario['RELACION']=="Estudiante"){

            $estudiante = $estudianteModel->select('*')->where('ID_USUARIO', $usuario['ID_USUARIO'])->first();
            $carrera = $carreraModel->find($estudiante['ID_CARRERA']);

            $info=[
                'id_estudiante' => $estudiante['ID_ESTUDIANTE'],
                'id_usuario' => $estudiante['ID_USUARIO'],
                'RUT' => $estudiante['RUT'],
                'nombre' => $estudiante['NOMBRE'],
                'matricula' => $estudiante['MATRICULA'],
                'nacimiento' => $estudiante['NACIMIENTO'],
                'email' => $estudiante['EMAIL_INSTITUCIONAL'],
                'estudiante_regular' => $estudiante['ESTUDIANTE_REGULAR'],
                'sct' => $estudiante['CREDITOS_APROBADOS'],
                'ramos_reprobados' => $estudiante['RAMOS_REPROBADOS'],
                'id_carrera' => $carrera['ID_CARRERA'],
                'carrera' => $carrera['NOMBRE'],
                'deuda_dafe' => $estudiante['DEUDOR_DAFE'],
                'deuda_biblioteca' => $estudiante['DEUDOR_BIBLIOTECA'],
                'estudiante_habilitado' => 'neutro'
            ];
            session()->set($info);

            return redirect()->to('estudiante/validacion');
        } 

        if($usuario['RELACION']=="Administrativo" && $usuario['PASS']==$pw) {

            $administrativo = $administrativoModel->select('*')->where('ID_USUARIO', $usuario['ID_USUARIO'])->first();

            $info=[
                'id_administrativo' => $administrativo['ID_ADMIN'],
                'nombre' => $administrativo['NOMBRE'],
                'email' => $administrativo['EMAIL']
            ];
            session()->set($info);
            return redirect()->to('admin');
        }

        $session-> setFlashData('status', 'El usuario o contraseña no corresponden, intente nuevamente.');

        return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso
    }
}