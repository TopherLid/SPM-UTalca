<?php

namespace App\Controllers;

use App\Models\PostulacionModel;
use CodeIgniter\Files\File;

class Test extends BaseController
{
    public function index(){

        $datos = [
            'info1' => "<p>sexo</p>",
            'info2' => "texto2",
            'info3' => "texto3",
        ];

        $datos += ['info4' => "texto4"];



        return view('testupload');
    }

    public function post_index(){

        $postulacionModel = new PostulacionModel();
        $postulacion = $postulacionModel->select('*')->orderBy('ID_POSTULACION', 'DESC')->first ();

        $postulante = [
            'id_postulante' => session()->get('id_postulante'),
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
        ];

        $cv = $this->request->getFile('cv');

        if (! $cv->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $cv->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cv.pdf');
            $data = ['uploaded_flleinfo' => new File($filepath)];

        }

        $interes = $this->request->getFile('cinteres');

        if (! $interes->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $interes->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cv.pdf');

            $data = ['uploaded_flleinfo' => new File($filepath)];

            //return view('upload_success', $data);
        }

        $antecedentes = $this->request->getFile('antecedentess');

        if (! $antecedentes->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $antecedentes->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cv.pdf');

            $data = ['uploaded_flleinfo' => new File($filepath)];

            //return view('upload_success', $data);
        }


        $cv = $this->request->getFile('cv');
            
        if (! $cv->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $cv->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cv.pdf');
            $data = ['uploaded_flleinfo' => new File($filepath)];
        }

        $antecedente = $this->request->getFile('antecedente');

        if (! $antecedente->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $antecedente->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'antecedente.pdf');
            $data = ['uploaded_flleinfo' => new File($filepath)];
        }

        $cinteres = $this->request->getFile('cinteres');

        if (! $cinteres->hasMoved()) {
            $filepath = WRITEPATH . 'uploads/' . $cinteres->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'cinteres.pdf');
            $data = ['uploaded_flleinfo' => new File($filepath)];
        }
        
        if ($postulante['deuda']==1){
            $verificador = $this->request->getFile('verificador');

            if (! $verificador->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $verificador->store($postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'], 'verificador.pdf');
                $data = ['uploaded_flleinfo' => new File($filepath)];
            }
        }


        //return view('upload_form', $data);
    }

}