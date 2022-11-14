<?php

namespace App\Controllers;

use App\Models\CarreraModel;
use App\Models\ConvocatoriaModel;
use App\Models\PaisModel;
use App\Models\PostulacionModel;
use App\Models\EstudianteModel;
use App\Models\ProgramaModel;
use App\Models\UniversidadModel;


#use App\Models\PreguntaModel; deberia ser respuesta

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends BaseController 
{

    public function exportar($aux)
    {
        $session = session();
        $sesion_creada = $session->has('id_administrativo');

        if($sesion_creada==false){
            return redirect()->to('/'); //http://inet.utalca.cl/intranet/auth_sso   
        }

        $carreraModel = new CarreraModel();
        $convocatoriaModel = new ConvocatoriaModel();
        $paisModel = new PaisModel();
        $postulacionModel = new PostulacionModel();
        $programaModel = new ProgramaModel();
        $universidadModel = new UniversidadModel();
        $estudianteModel = new EstudianteModel();

        $convocatoria  = $convocatoriaModel->find($aux);
        $programa  = $programaModel->find($convocatoria['ID_PROGRAMA']);
        $postulaciones  = $postulacionModel->select('*')->where('ID_CONVOCATORIA', $aux)->findAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->setTitle("Convocatoria_".$convocatoria['ID_CONVOCATORIA']);;
        $sheet = $spreadsheet->getActiveSheet();

        /*
         * Constructor de los titulos de las celdas
         */

        $sheet->setCellValue('A1', '# N°');
        $sheet->setCellValue('B1', 'Nombre Completo');
        $sheet->setCellValue('C1', 'Primer Nombre');
        $sheet->setCellValue('D1', 'Rut');
        $sheet->setCellValue('E1', 'Nacionalidad');
        $sheet->setCellValue('F1', 'Matricula');
        $sheet->setCellValue('G1', 'Correo Institucional');
        $sheet->setCellValue('H1', 'Correo Personal');
        $sheet->setCellValue('I1', 'Celular');
        $sheet->setCellValue('J1', 'Campus');
        $sheet->setCellValue('K1', 'Facultad');
        $sheet->setCellValue('L1', 'Carrera');
        $sheet->setCellValue('M1', 'Pos'); # Ranking movilidad
        $sheet->setCellValue('N1', 'Porcentaje'); # porcentaje de movilidad
        $sheet->setCellValue('O1', 'PAT'); # Promedio Total Cursados
        $sheet->setCellValue('P1', 'PM'); # Puntaje Movilidad
        $sheet->setCellValue('Q1', 'Rep'); #
        $sheet->setCellValue('R1', 'ECTS'); #
        $sheet->setCellValue('S1', 'Inglés'); 
        $sheet->setCellValue('T1', 'Otro Idioma');
        $sheet->setCellValue('U1', 'Programa');
        $sheet->setCellValue('V1', 'Universidad 1');
        $sheet->setCellValue('W1', 'Universidad 2');
        $sheet->setCellValue('X1', 'Universidad 3');
        $sheet->setCellValue('Y1', '¿Crédito?');
        $sheet->setCellValue('Z1', 'Resultado');
        $sheet->setCellValue('AA1', 'Universidad destino');
        $sheet->setCellValue('AB1', 'Pais destino');
        $sheet->setCellValue('AC1', 'Confirmación');

        $contador_columna=2;
        $num=1;

        /*
         * Constructor de los datos de las celdas
         */

        foreach ($postulaciones as $postulacion){

            $sheet->setCellValue('A'.$contador_columna, $num);

            $estudiante = $estudianteModel -> select('*')->where('ID_ESTUDIANTE', $postulacion['ID_ESTUDIANTE'])->first();
            $carrera = $carreraModel->select('*')->where('ID_CARRERA', $estudiante['ID_CARRERA'])->first();

            $u1 = $universidadModel->find($postulacion['PRIMERA_OPCION']);
            $u2 = $universidadModel->find($postulacion['SEGUNDA_OPCION']);
            $u3 = $universidadModel->find($postulacion['TERCERA_OPCION']);

            /**
             * Si no existe selección por su estado (Rechazado o modificable),
             * Cambia la celda por el estado.
             * En caso de ser aprobada, la celda ingresa la universidad y el país.
             */
            
            if ($postulacion['SELECCION']==0 && $postulacion['ESTADO']=="Rechazada"){
                $seleccion = ['NOMBRE' => "Rechazado"];
                $pais = ['NOMBRE' => "Rechazada o no verificado"];
            } 
            
            if ($postulacion['SELECCION']==0 && $postulacion['ESTADO']!="Modificable"){
                $seleccion = ['NOMBRE' => "Modificable"];
                $pais = ['NOMBRE' => "Modificable"];
            }
        
            if ($postulacion['SELECCION']!=0){
                $seleccion = $universidadModel->find($postulacion['SELECCION']);
                $pais = $paisModel->find($seleccion['ID_PAIS']);
            }

            $sheet->setCellValue('B'.$contador_columna, $estudiante['NOMBRE']);
            $sheet->setCellValue('C'.$contador_columna, 'Nombre');
            $sheet->setCellValue('D'.$contador_columna, $estudiante['RUT']);
            $sheet->setCellValue('E'.$contador_columna, $postulacion['NACIONALIDAD']);
            $sheet->setCellValue('F'.$contador_columna, $estudiante['MATRICULA']);
            $sheet->setCellValue('G'.$contador_columna, $estudiante['EMAIL_INSTITUCIONAL']);

            $sheet->setCellValue('H'.$contador_columna, $postulacion['EMAIL_PERSONAL']);
            $sheet->setCellValue('I'.$contador_columna, $postulacion['N_TELEFONO']);    
 
            $sheet->setCellValue('L'.$contador_columna, $carrera['NOMBRE']);
            $sheet->setCellValue('J'.$contador_columna, $carrera['CAMPUS']);
            $sheet->setCellValue('K'.$contador_columna, $carrera['FACULTAD']);

            $sheet->setCellValue('M'.$contador_columna, $estudiante['POS']);
            $sheet->setCellValue('N'.$contador_columna, $estudiante['PORCENTAJE']);
            $sheet->setCellValue('O'.$contador_columna, $estudiante['PAT']);
            $sheet->setCellValue('P'.$contador_columna, $estudiante['PM']);

            $sheet->setCellValue('Q'.$contador_columna, $estudiante['RAMOS_REPROBADOS']);
            $sheet->setCellValue('R'.$contador_columna, $estudiante['CREDITOS_APROBADOS']);
            $sheet->setCellValue('S'.$contador_columna, $postulacion['NIVEL_INGLES']);
            $sheet->setCellValue('T'.$contador_columna, $postulacion['IDIOMA_2']);
            
            $sheet->setCellValue('U'.$contador_columna, $convocatoria['NOMBRE']);

            /**
             * Si el estado es "Aceptado", 
             * el postulante utilizará crédito.
             */

            if ($postulacion['ESTADO']=="Aceptado"){
                $sheet->setCellValue('Y'.$contador_columna, "Si");
            } else {
                $sheet->setCellValue('Y'.$contador_columna, "No");
            }
        
            $sheet->setCellValue('Z'.$contador_columna, $postulacion['ESTADO']);
                
            $sheet->setCellValue('V'.$contador_columna, $u1['NOMBRE']);
            $sheet->setCellValue('W'.$contador_columna, $u2['NOMBRE']);
            $sheet->setCellValue('X'.$contador_columna, $u3['NOMBRE']);
            $sheet->setCellValue('AA'.$contador_columna, $seleccion['NOMBRE']);
            $sheet->setCellValue('AB'.$contador_columna, $pais['NOMBRE']);
            $sheet->setCellValue('AB'.$contador_columna, $postulacion['CONFIRMACION']);
                
            $contador_columna++;
            $num++;
        }
                
        $writer = new Xlsx($spreadsheet);

        $date = date('d-m-y');
        $date = str_replace(".", "", $date);
        $filename = "convocatoria_".$aux."_fecha_".$date.".xlsx";
        
        try {
            $writer = new Xlsx($spreadsheet);
            $writer->save($filename);
            $content = file_get_contents($filename);
        } catch(Exception $e) {
            exit($e->getMessage());
        }
        
        header("Content-Disposition: attachment; filename=".$filename);
        
        unlink($filename);
        exit($content);

    }

}