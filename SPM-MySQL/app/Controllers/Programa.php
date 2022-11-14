<?php

namespace App\Controllers;

use App\Models\ProgramaModel;

class Programa extends BaseController
{
    public function programas()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $programaModel = new ProgramaModel();
        
        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];

        $programas = $programaModel->paginate(25);
        $paginador=$programaModel->pager;

        # En caso de ser vacía retorna False para ser trabajada en la vista

        if(empty($programas) || is_null($programas)){
            $programas = false;
        }
        
        $data=array('programas'=>$programas, 'usuario'=>$usuario, 'paginador'=>$paginador);
        
        return view('admin/programas/vista', $data);
    }

    public function crear()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $programaModel = new ProgramaModel();

        $data = [
            'NOMBRE'=> $this->request->getVar('nombre_programa') ,
            'DESCRIPCION'=>$this->request->getVar('descripcion_programa')
        ];

        # Guarda el nuevo programa

        if ($programaModel->save($data)){

            # Genera alerta y devuelve a Programas

            $session-> setFlashData('status', 'Programa creado correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/programas');

        } else {

            # Genera alerta y devuelve a Programas

            $session-> setFlashData('status', 'El programa no ha sido creado.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/programas');
        }

    }

    public function modificar()
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $programaModel = new ProgramaModel();
        $aux = $this->request->getVar('id_programa');

        $data = [
            'NOMBRE' => $this->request->getVar('nombre_programa'),
            'DESCRIPCION' => $this->request->getVar('descripcion_programa'),
            'ESTADO' => $this->request->getVar('estado_programa')
        ];
        
        # Modifica el programa con las características otorgadas

        if ($programaModel->update($aux, $data)){

            # Genera alerta y devuelve a Programas

            $session-> setFlashData('status', 'Programa modificado correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');

            return redirect()->to('admin/programas');

        } else {

            # Genera alerta y devuelve a Programas
            
            $session-> setFlashData('status', 'El programa no ha sido modificado.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/programas');

        }
    }
}