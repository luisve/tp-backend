<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/////////////////////////////////////////////////
//$routes->get('/(:segment)', 'Home::index/$1');
//$routes->get('/', 'Home::index');
//////////////////////////

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
/*
$routes->resource( 'listarCiudades', ['controller' => 'CiudadController']);
$routes->get( 'listarCiudades', 'CiudadController::index');
$routes->get( 'listarCiudades/(:segment)', 'CiudadController::show/$1');
$routes->post( 'listarCiudades', 'CiudadController::create');
$routes->put('listarCiudades/(:segment)', 'CiudadController::update/$1');
*/
//$routes->resource( 'login', ['controller' => 'LoginController']);
////
//$routes->get( 'Home', 'Home::Main');


$routes->post('Login', 'UsuarioController::Login');


$routes->get('PasesMovimientos/Paso', 'PasesMovimientosController::Paso');
$routes->get('PasesMovimientos/Diferido', 'PasesMovimientosController::Diferido');
$routes->get('PasesMovimientos/Iniciar', 'PasesMovimientosController::Iniciar');
//$routes->get('PasesMovimientos/GeHora', 'PasesMovimientosController::GetHora');


$routes->group(
	'',
	['filter' => 'myauth:true', 'namespace' => 'App\Controllers'],
	static function ($routes) {


		$routes->get("PasesMovimientos/GetList", "PasesMovimientosController::GetList");
		$routes->post("PasesMovimientos/Carga", "PasesMovimientosController::Carga");


		$routes->get("Clientes/GetList", "ClienteController::GetList");
		$routes->get("Clientes/Get", "ClienteController::Get");
		$routes->post("Clientes/Set", "ClienteController::Set");


		$routes->get("Usuarios/GetList", "UsuarioController::GetList");
		$routes->get("Usuarios/Get", "UsuarioController::Get");
		$routes->post("Usuarios/Set", "UsuarioController::Set");
		$routes->post("Usuarios/SetPassword", "UsuarioController::SetPassword");
		$routes->post("Usuarios/Logout", "UsuarioController::Logout");


		$routes->get("Clientes/GetSelect", "ClienteController::GetSelect");
		$routes->get("Pases/GetSelect", "PaseController::GetSelect");
	}


);