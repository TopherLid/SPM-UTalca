<?php

namespace App\Controllers;

use App\Models\PaisModel;
use App\Models\UniversidadModel;
use App\Models\ProgramaModel;
use App\Models\DetalleUniversidadModel;

class Universidad extends BaseController 
{
    public function universidades()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }
            
        $universidadModel = new UniversidadModel();
        $detalleUniversidadModel = new DetalleUniversidadModel();
        $paisModel = new PaisModel();
        $programaModel = new ProgramaModel();

        $usuario=[
            'id_administrativo' => session()->get('id_administrativo'),
            'nombre' => session()->get('nombre'),
            'email' => session()->get('email')
        ];

        /**
         * La función paginate muestra un máximo de 25 datos en la tabla, generando un botón para ver los sgtes 25 datos
         */

        $universidades_base = $universidadModel->paginate(25);
        $paginador = $universidadModel->pager;

        $detalleUniversidad = $detalleUniversidadModel->findAll();
        $programas = $programaModel->findAll();
        $paises = $paisModel -> findAll();

        /**
         * Revisa si existen datos dentro de la tabla PAIS y UNIVERSIDAD
         * En caso de ser falso le pide que cree añada universidades
         */

        if(empty($paises) || is_null($paises)){
            $paises = false;
        }

        if(empty($universidades_base) || is_null($universidades_base)){
            $universidades = false;
        } else {
            $contador = 0;

            foreach ($universidades_base as $universidad) {

                $pais = $paisModel ->find($universidad['ID_PAIS']);
    
                $cambiar[$contador]=[
                    'ID_UNIVERSIDAD' => $universidad['ID_UNIVERSIDAD'],
                    'NOMBRE' => $universidad['NOMBRE'],
                    'ESTADO' => $universidad['ESTADO'],
                    'NOMBRE_PAIS' => $pais['NOMBRE']
                ];

                $detalleUniversidad = $detalleUniversidadModel->select('*')->where('ID_UNIVERSIDAD', $universidad['ID_UNIVERSIDAD'] )->findAll();

                if (! empty($universidades_base) || ! is_null($universidades_base)) {

                    $contador_u = 1 ;

                    foreach ($detalleUniversidad as $du){

                        $programa = $programaModel ->find($du['ID_PROGRAMA']);

                        $cambiar[$contador] += ['programa_'.$contador_u => $programa['NOMBRE']];
                        $contador_u++;
                        
                    }

                    $cambiar[$contador] += ['programas_contador'=>$contador_u];

                }
                $universidades = array_replace($universidades_base, $cambiar);
                $contador++;
            }
        }

        /**
         * Toma la información y la guarda en el arreglo data, el cual, es mostrado en la vista
         */
        
        $data=array('usuario'=>$usuario, 'universidades'=>$universidades, 'programas'=>$programas, 'detalleUniversidad'=>$detalleUniversidad, 'paises'=>$paises, 'paginador'=>$paginador);
        
        return view('admin/universidades/vista', $data);
    }

    public function crear()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $universidadModel = new UniversidadModel();
        $paisModel = new PaisModel();
        $programaModel = new ProgramaModel();
        $detalleUniversidadModel = new DetalleUniversidadModel();

        # Busca los recursos que se generaron en el formulario

        $data = [
            'NOMBRE'=>$this->request->getVar('nombre_universidad'),
            'ID_PAIS'=>$this->request->getVar('pais')
        ];

        # Si es correcta la inserción, busca los programas ingresados

        if($universidadModel->save($data)){ 

            $nueva_u = $universidadModel->orderBy('ID_UNIVERSIDAD', 'DESC')->first();

            # Si existen programas en la checkbox, genera una inserción de IDs en la tabla de detalle 

            if(! is_null($this->request->getVar('programa'))){

                foreach($_POST['programa'] as $value){
                    $detalle_universidad = [
                        'ID_PROGRAMA' => $value,
                        'ID_UNIVERSIDAD' => $nueva_u['ID_UNIVERSIDAD']
                    ];
                    $detalleUniversidadModel->save($detalle_universidad);
                }
            }

            # Genera alerta y devuelve a Universidades

            $session-> setFlashData('status', 'La universidad se ha registrado correctamente.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');
    
            return redirect()->to('admin/universidades');
            
        } else {

            # Genera alerta y devuelve a Universidades

            $session-> setFlashData('status', 'La universidad NO se ha registrado correctamente.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');
    
            return redirect()->to('admin/universidades');
        }
    }

    public function modificar()
    {
        $session = session();

        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $universidadModel = new UniversidadModel(); 
        $programaModel = new ProgramaModel();
        $detalleUniversidadModel = new DetalleUniversidadModel();

        # Recibe el identificador oculto y busca el detalle existente (las múltiples asociaciones a programas)

        $aux = $this->request->getVar('id_universidad');
        $detalle_universidad = $detalleUniversidadModel->select('*')->where('ID_UNIVERSIDAD', $aux)->findAll();
        $programas = $programaModel->findAll();

        # Guarda en un arreglo la información para actualizarla

        $data = [
            'NOMBRE'=>$this->request->getVar('nombre_universidad'),
            'ESTADO'=>$this->request->getVar('estado'),
            'ID_PAIS'=>$this->request->getVar('pais')
        ];

        /**
         * Si actualiza la información: 
         * Revisa la cantidad de programas existentes asociados
         * En caso de existir, los elimina todos
         * Una vez eliminados, inserta todos los programas nuevos asociados
         */

        if($universidadModel->update($aux, $data)){

            if (is_null($this->request->getVar('programa'))){

                if(is_null($detalle_universidad)){

                    # Genera alerta y devuelve a Universidades
    
                    $session-> setFlashData('status', 'La universidad continua sin programa perteneciente.');
                    $session-> setFlashData('status_action', 'alert-success');
                    $session-> setFlashData('status_alert', '¡Correcto!');
    
                    return redirect()->to('admin/universidades');
    
                } else {
    
                    foreach ($detalle_universidad as $du){
                        $detalleUniversidadModel->delete($du['ID_UNIVERSIDAD']);
                    }

                    # Genera alerta y devuelve a Universidades
    
                    $session-> setFlashData('status', 'Se han eliminado los programas de la universidad.');
                    $session-> setFlashData('status_action', 'alert-success');
                    $session-> setFlashData('status_alert', '¡Correcto!');
    
                    return redirect()->to('admin/universidades');
                }
            }
    
            foreach ($detalle_universidad as $du_eliminar){
                $detalleUniversidadModel->delete($du_eliminar['ID_DET_UNIVERSIDAD']);
            }

            if (! is_null($this->request->getVar('programa'))) {

                foreach ($_POST['programa'] as $valor){

                    $datos_universidad = [
                        'ID_PROGRAMA' => $valor,
                        'ID_UNIVERSIDAD' => $aux
                    ];

                    $detalleUniversidadModel->save($datos_universidad); 
                }
            }

            # Genera alerta y devuelve a Universidades

            $session-> setFlashData('status', 'Se ha modificado la universidad y sus programas.');
            $session-> setFlashData('status_action', 'alert-success');
            $session-> setFlashData('status_alert', '¡Correcto!');
    
            return redirect()->to('admin/universidades');

        } else {

            # Genera alerta y devuelve a Universidades

            $session-> setFlashData('status', 'La universidad no ha sido modificada.');
            $session-> setFlashData('status_action', 'alert-danger');
            $session-> setFlashData('status_alert', '¡Error!');

            return redirect()->to('admin/universidades'); 
        }
    }
}