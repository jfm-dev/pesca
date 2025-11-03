<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

$routes->get('/', 'Home::index', ['as', '/']);


// home
$routes->group('home', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('start', 'Home::dashboard', ['as' => 'start']);
});

$routes->get('password/reset', 'User::password_reset', ['as' => 'password_reset']);
$routes->post('send/password/reset', 'User::send_password_reset', ['as' => 'send_password_reset']);
$routes->get('password/renew/(:any)', 'User::password_renew/$1', ['as' => 'password_renew']);
$routes->get('password/error', 'User::password_error', ['as' => 'password_error']);
$routes->post('password/update', 'User::password_update', ['as' => 'password_update']);



$routes->post('send/newsletter', 'Home::subscriber', ['as' => 'subscriber']);


// Login
$routes->group('auth', static function ($routes) {
    $routes->get('login', 'Login::index', ['as' => 'login']);
    $routes->post('login', 'Login::login', ['as' => 'user_login']);
    $routes->get('logout', 'Login::logout', ['as' => 'user_logout']);
    // $routes->get('blog', 'Admin\Blog::index');
});

// users
$routes->group('user', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('list', 'User::index', ['as' => 'list_users']);
    $routes->post('save', 'User::save_user', ['as' => 'save_user']);
    $routes->post('delete', 'User::delete_user', ['as' => 'delete_user']);
    $routes->post('update', 'User::update_user', ['as' => 'update_user']);
    $routes->post('update/password', 'User::update_password', ['as' => 'update_password']);
});



// departments
$routes->group('departments', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('list', 'Departments::index', ['as' => 'list_departments']);
    $routes->post('save/department', 'Departments::save_department', ['as' => 'save_department']);
    $routes->post('delete/category', 'Category::delete_category', ['as' => 'delete_category']);
    $routes->post('update/category', 'Category::update_category', ['as' => 'update_category']);
});

// fishing_session
$routes->group('sessions', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('list', 'FishingSession::index', ['as' => 'list_sessions']);
    $routes->post('save/session', 'FishingSession::save_session', ['as' => 'save_session']);
    $routes->post('save/files', 'FishingSession::save_files', ['as' => 'save_files']);
    $routes->post('delete/file', 'FishingSession::delete_session_file', ['as' => 'delete_session_file']);
    $routes->post('delete/publication', 'FishingSession::delete_session', ['as' => 'delete_session']);
    $routes->post('update/session', 'FishingSession::update_session', ['as' => 'update_session']);
});

// notices
$routes->group('notice', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('list', 'Notice::index', ['as' => 'list_notice']);
    $routes->post('save', 'Notice::save_notice', ['as' => 'save_notice']);
    $routes->get('print/invoice/recipe/(:num)', 'PrintFiles::print_invoice_recipe/$1', ['as' => 'print_invoice_recipe']);
    $routes->post('delete', 'Notice::delete_notice', ['as' => 'delete_notice']);
    $routes->post('update', 'Notice::update_notice', ['as' => 'update_notice']);
});

// printfiles
$routes->group('print', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('print/cotation/(:num)', 'PrintFiles::print_cotation/$1', ['as' => 'print_cotation']);
    $routes->get('print/invoice/(:num)', 'PrintFiles::print_invoice/$1', ['as' => 'print_invoice']);
    $routes->get('print/invoice/recipe/(:num)', 'PrintFiles::print_invoice_recipe/$1', ['as' => 'print_invoice_recipe']);
});

// email
$routes->group('email', static function ($routes) {
    $routes->post('contact/us', 'Email::contact_us', ['as' => 'contact_us']);
});

// send sms
$routes->group('sms', static function ($routes) {
    $routes->get('send/to', 'SendSms::send_sms', ['as' => 'send_sms']);
    $routes->get('send/to1/(:any)', 'Sms::sendSMS/$1', ['as' => 'send_sms1']);
});
// message
$routes->group('newsletter', ['filter' => 'loginfilter'], static function ($routes) {
    $routes->get('list/message', 'Newsletter::list_message', ['as' => 'list_message']);
    $routes->get('list/contacts', 'Newsletter::list_contacts', ['as' => 'list_contacts']);
    $routes->post('message/save', 'Newsletter::save_message', ['as' => 'save_message']);
    $routes->post('message/update', 'Newsletter::update_message', ['as' => 'update_message']);
    $routes->post('message/delete', 'Newsletter::delete_message', ['as' => 'delete_message']);
    $routes->post('contact/save', 'Newsletter::save_contact', ['as' => 'save_contact']);
    $routes->post('contact/delete', 'Newsletter::delete_contact', ['as' => 'delete_contact']);
    $routes->post('contact/update', 'Newsletter::update_contact', ['as' => 'update_contact']);





    $routes->post('message/send', 'Newsletter::send_message', ['as' => 'send_message']);
});




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
