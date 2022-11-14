<?php

namespace App\Controllers;

use App\Models\ConvocatoriaModel;
use App\Models\PostulacionModel;
use App\Models\EstudianteModel;
use App\Models\CarreraModel;
use App\Models\UniversidadModel;
use App\Models\ProgramaModel;
use App\Models\IdiomaModel;

use Dompdf\Dompdf;

class PDF extends BaseController 
{

    public function copia($aux)
    {
        $session = session();

        $sesion_creada = $session->has('id_estudiante');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $postulacionModel = new PostulacionModel();
        $universidadModel = new UniversidadModel();
        $idiomaModel = new IdiomaModel();

        $postulacion = $postulacionModel->find($aux);

        $universidad1 = $universidadModel -> find($postulacion['1RA_OPCION']);
        $universidad2 = $universidadModel -> find($postulacion['2DA_OPCION']);
        $universidad3 = $universidadModel -> find($postulacion['3RA_OPCION']);

        $idioma = $idiomaModel -> find($postulacion['IDIOMA_2']);


        $estudiante = [
            'id_estudiante' => session()->get('id_estudiante'),
            'id_usuario' => session()->get('id_usuario'),
            'RUT' => session()->get('RUT'),
            'nombre' => session()->get('nombre'),
            'matricula' => session()->get('matricula'),
            'nacimiento' => session()->get('nacimiento'),
            'email' => session()->get('email'),
            'sct' => session()->get('sct'),
            'estudiante_regular' => session()->get('estudiante_regular'),
            'carrera' => session()->get('carrera'),
            'deuda'=>session()->get('deuda')
        ];

        if ($estudiante['id_estudiante']!=$postulacion['ID_ESTUDIANTE']){
            return redirect()->to('/');
        }
        
        $datos = array('postulacion'=> $postulacion, 'estudiante'=>$estudiante, 'universidad1'=>$universidad1, 'universidad2'=>$universidad2, 'universidad3'=>$universidad3, 'idioma'=>$idioma);

        $documento = new Dompdf();
        $documento->set_option('isRemoteEnabled', TRUE);
        
        $html = view('template/pdf', $datos); 
        $documento->loadHTML($html);
        $documento->setPaper('A4', 'portrait');
        $documento->render();
        $documento->stream("Postulacion".$aux, array("Attachment"=>1));

    }

    public function cv($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        helper("filesystem");

        $postulacionModel = new PostulacionModel();

        $postulacion = $postulacionModel->find($aux);

        $filename = "cv.pdf";

        return $this->response->download(ROOTPATH.'/writable/uploads/'.$postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'].'/'.$filename, null);

    }

    public function antecedentes($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        helper("filesystem");

        $postulacionModel = new PostulacionModel();

        $postulacion = $postulacionModel->find($aux);

        $filename = "antecedentes.pdf";

        return $this->response->download(ROOTPATH.'/writable/uploads/'.$postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'].'/'.$filename, null);


    }


    public function cinteres($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }


        helper("filesystem");

        $postulacionModel = new PostulacionModel();

        $postulacion = $postulacionModel->find($aux);

        $filename = "interes.pdf";

        return $this->response->download(ROOTPATH.'/writable/uploads/'.$postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'].'/'.$filename, null);


    }


    public function verificador($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }


        helper("filesystem");

        $postulacionModel = new PostulacionModel();

        $postulacion = $postulacionModel->find($aux);

        $filename = "verificador.pdf";

        return $this->response->download(ROOTPATH.'/writable/uploads/'.$postulacion['ID_CONVOCATORIA'].'/'.$postulacion['ID_POSTULACION'].'/'.$filename, null);



    }



}
