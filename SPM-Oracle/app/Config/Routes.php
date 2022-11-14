<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthSPM');
$routes->setDefaultMethod('inicio');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function (){
    echo view('template/404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* Root/raiz del proyecto */

$routes->get('/', 'AuthSPM::inicio');
$routes->post('/verificador', 'AuthSPM::validador');

/* Rutas del panel de Estudiantes */

$routes->get('/estudiante/validacion', 'Estudiante::verificador');
$routes->get('/estudiante/formulario', 'Estudiante::formulario');
$routes->post('/postulacion/estado', 'Estudiante::guardar');

$routes->get('/postulacion/correcto', 'Estudiante::correcto');
$routes->get('/estudiante/copia/(:num)','PDF::copia/$1');

/* Historial de estudiantes */

$routes->get('/estudiante/historial', 'Estudiante::historial');
$routes->get('/estudiante/historial/(:num)', 'Estudiante::individual/$1');

/* Modificación de Postulación */

$routes->put('/estudiante/historial/modificar', 'Estudiante::modificar');
$routes->get('/estudiante/salir','Estudiante::logout');

/* Rutas del panel de administrador */

$routes->get('/admin','Admin::home');
$routes->get('/admin/salir','Admin::logout');

/* Rutas de Convocatoria */

$routes->get('/admin/convocatorias','Convocatoria::index');
$routes->get('/admin/convocatorias/(:num)','Convocatoria::vista/$1');

/* CRUD Convocatoria */

$routes->post('/admin/convocatorias/crear','Convocatoria::crear');
$routes->post('/admin/convocatoria/modificarformulario', 'Convocatoria::modificar_preguntas');
$routes->put('/admin/convocatoria/modificar','Convocatoria::modificar');
$routes->delete('/admin/convocatoria/eliminar', 'Convocatoria::eliminar');

/* Rutas del panel de Programas */

$routes->get('/admin/programas','Programa::programas');
$routes->get('/admin/programas/(:num)','Programa::vista/$1');

/* CRUD Programas */

$routes->post('/admin/programas/crear','Programa::crear');
$routes->put('/admin/programas/modificar','Programa::modificar'); 

/* Rutas del panel de Postulantes */

$routes->get('/admin/postulantes','Postulante::postulantes');
$routes->get('/admin/postulantes/(:num)','Postulante::registro/$1');

/* Modificadores de Postulación */

$routes->put('/admin/estudiante/estado','Postulante::seleccion');
$routes->post('/admin/postulante/confirmacion', 'Postulante::confirmacion');

/* Archivos subidos por el Estudiante */

$routes->get('/postulante/cv/(:num)', 'PDF::cv/$1');
$routes->get('/postulante/antecedente/(:num)', 'PDF::antecedentes/$1');
$routes->get('/postulante/cinteres/(:num)', 'PDF::cinteres/$1');
$routes->get('/postulante/verificador/(:num)', 'PDF::verificador/$1');

/* Excel */

$routes->get('/admin/postulantes/exportar/(:num)', 'Excel::exportar/$1');

/* Notificación */

$routes->put('/admin/movilidad/notificar', 'Notificacion::email');

/* Rutas del panel de Universidades */

$routes->get('/admin/universidades','Universidad::universidades');

/* CRUD de Universidades */

$routes->post('/admin/universidades/crear','Universidad::crear');
$routes->post('/admin/universidades/modificar','Universidad::modificar');

/* Rutas del panel de Formulario */

$routes->get('/admin/formulario','Formulario::formulario');
$routes->get('/admin/formulario/(:num)','Formulario::form_edit_admin/$1');

/* CRUD Preguntas */

$routes->post('/admin/formulario/crear/input','Formulario::crear_input');
$routes->post('/admin/formulario/crear/multiple','Formulario::crear_multiple');

$routes->put('/admin/formulario/modificar','Formulario::modificar');
$routes->put('/admin/formulario/multiple','Formulario::modificar_multiple');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
