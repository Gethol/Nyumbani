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
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/properties/(:num)', 'Properties::index/$1');
$routes->get('/listing/(:num)','Listing::index/$1');
$routes->get('/listings','Listing::getListings');
$routes->get('/listings/(:num)','Listing::getSingleListing/$1');



$routes->get('/tenants/(:num)','Properties::getTenantProperties/$1');
$routes->get('/tenants/requests/(:num)','Requests::tenantRequests/$1');



$routes->get('/payments/(:num)','Payments::extract/$1');
$routes->get('/payments/summary/(:num)','Payments::summary/$1');
$routes->get('/transactions/(:num)','Payments::getTransactions/$1');


$routes->get('/verifications','VerificationController::Requestindex');
$routes->get('/verifications/(:num)','VerificationController::Requestdetails/$1');

$routes->get('/verifications/accept/(:num)','VerificationController::Queueconfirm/$1');
$routes->get('/verifications/reject/(:num)','VerificationController::Queuereject/$1');

$routes->get('/verifications/accepted','VerificationController::Approvedindex');
$routes->get('/verifications/rejected','VerificationController::rejectedindex');
$routes->get('/queue/(:num)','VerificationController::Queueindex/$1');


$routes->post('/login','UserAuthorization::login');
$routes->post('/register','UserAuthorization::register'); 
$routes->post('/tenants/submit_request','Requests::store');

$routes->post('/enqueue','VerificationController::QueuebeginVerification');





$routes->match(['get','post'],'/addProperty/dummyview', 'AddProperty::dummyview');
$routes->match(['get','post'],'/addProperty', 'AddProperty::index');
//Small spelling error above changed - 'addpropery' to 'addproperty'

$routes->get('/applications/(:num)','Applications::index/$1');
$routes->get('/requests/(:num)','Requests::index/$1');

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