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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 *obtiene toda la informacion
 * $routes->get('nameRoute','Controller::function',['as'=>'identifier']);
 *envia toda la informacion del cuerpo requerido
 * $routes->post('nameRoute','Controller::function',['as'=>'identifier']);
 * 
 * se usa la palabra reservada y se identifica el tipo de metodo que se usara recibir o mandar info, nombre de la ruta y eso se manda de 
 * manera interna al controlador y del controlador a la funcion
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('example','Home::hello');
//$routes->get('inicio_sesion', 'Home::index');
$routes->get('inicio_sesion', 'Usuario\InicioSesion::index');
$routes->get('dashboard','Panel\Dashboard::index');

//Usuarios
$routes->get('usuarios','Panel\Usuarios::index');
//Usuario Nuevo
$routes->get('usuario_nuevo','Panel\Usuario_nuevo:index');
$routes->get('registrar_usuario','Panel\Usuario_nuevo:registrar');

$routes->get('verificarUsuario', 'Usuario\InicioSesion::validarusuario');
$routes->post('registrar','Usuario\InicioSesion::validarusuario');

$routes->get('cerrar_sesion', 'Usuario\CerrarSesion::index');
 
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