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

$routes->get('/user/:id/edit', function($id) {
    UserController::edit($id);
});

$routes->post('/user/:id/edit', function($id) {
    UserController::update($id);
});

$routes->get('/user/:id', function($id) {
    UserController::user_show($id);
});

$routes->post('/user/:id/destroy', function($id) {
    UserController::destroy($id);
});

$routes->get('/user_list', function() {
    UserController::user_list();
});

$routes->post('/logout', function(){
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



/* AineetController */

$routes->get('/aine_list', function() {
    AineetController::aine_list();
});