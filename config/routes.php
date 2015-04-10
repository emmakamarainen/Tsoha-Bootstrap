<?php

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

/* JuomatController */

$routes->get('/home', function() {
    JuomatController::home();
});

$routes->get('/', function() {
    JuomatController::home();
});

$routes->get('/search', function() {
    JuomatController::search();
});


$routes->get('/drink/:id/edit', function($id) {
    JuomatController::edit($id);
});

$routes->post('/drink/:id/edit', function($id) {
    JuomatController::update($id);
});

$routes->get('/drink_list', function() {
    JuomatController::drink_list();
});

$routes->get('/drink/:id', function($id) {
    JuomatController::drink_show($id);
});

$routes->post('/drink', function() {
    JuomatController::store();
});

$routes->post('/drink_new', function() {
    JuomatController::store();
});

$routes->get('/drink_new', function() {
    JuomatController::drink_new();
});


$routes->post('/drink/:id/destroy', function($id) {
    JuomatController::destroy($id);
});

/* UserController */

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

/* AineetController */

$routes->get('/aine_list', function() {
    AineetController::aine_list();
});