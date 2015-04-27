<?php

function check_logged_in() {
    JuomatController::check_logged_in();
}

$routes->get('/home', function() {
    JuomatController::home();
});

$routes->get('/', function() {
    JuomatController::home();
});

$routes->get('/drink/:id/edit', 'check_logged_in', function($id) {
    JuomatController::edit($id);
});

$routes->post('/drink/:id/edit', 'check_logged_in', function($id) {
    JuomatController::update($id);
});

$routes->get('/drink_list', 'check_logged_in', function() {
    JuomatController::drink_list();
});

$routes->get('/drink/:id', 'check_logged_in', function($id) {
    JuomatController::drink_show($id);
});

$routes->post('/drink', 'check_logged_in', function() {
    JuomatController::store();
});

$routes->post('/drink_new', 'check_logged_in', function() {
    JuomatController::store();
});

$routes->get('/drink_new', 'check_logged_in', function() {
    JuomatController::drink_new();
});

$routes->post('/drink/:id/destroy', 'check_logged_in', function($id) {
    JuomatController::destroy($id);
});

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->get('/user/:id/user_edit', function($id) {
    UserController::edit($id);
});

$routes->post('/user/:id/user_edit', function($id) {
    UserController::update($id);
});

$routes->get('/user/:id/user_rights', function($id) {
    UserController::edit_rights($id);
});

$routes->post('/user/:id/user_rights', function($id) {
    UserController::update_rights($id);
});

$routes->get('/user/:id', function($id) {
    UserController::user_show($id);
});

$routes->post('/user/:id/destroy', function($id) {
    UserController::destroy($id);
});

$routes->get('/user_list', 'check_logged_in', function() {
    UserController::user_list();
});

$routes->post('/logout', function() {
    UserController::logout();
});

$routes->post('/user', function() {
    UserController::store();
});

$routes->post('/user_new', function() {
    UserController::store();
});

$routes->get('/user_new', function() {
    UserController::user_new();
});

$routes->get('/aine_list', 'check_logged_in', function() {
    AineetController::aine_list();
});

$routes->get('/drink/:id/ainesosa', 'check_logged_in', function($id) {
    AineetController::aine_new($id);
});

$routes->post('/drink/:id/ainesosa', 'check_logged_in', function($id) {
    AineetController::drink_aine_store($id);
});
