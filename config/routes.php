<?php

$routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

function check_logged_in(){
  JuomatController::check_logged_in();
}

/* JuomatController */

$routes->get('/home', function() {
    JuomatController::home();
});

$routes->get('/', function() {
    JuomatController::home();
});

$routes->get('/drink/drink_search','check_logged_in', function() {
    JuomatController::search();
});

$routes->get('/drink/:id/edit','check_logged_in', function($id) {
    JuomatController::edit($id);
});

$routes->post('/drink/:id/edit','check_logged_in', function($id) {
    JuomatController::update($id);
});

$routes->get('/drink_list','check_logged_in', function() {
    JuomatController::drink_list();
});

$routes->get('/drink/:id','check_logged_in', function($id) {
    JuomatController::drink_show($id);
});

$routes->post('/drink','check_logged_in', function() {
    JuomatController::store();
});

$routes->post('/drink_new','check_logged_in', function() {
    JuomatController::store();
});

$routes->get('/drink_new','check_logged_in', function() {
    JuomatController::drink_new();
});

$routes->post('/drink/:id/destroy','check_logged_in', function($id) {
    JuomatController::destroy($id);
});

/* UserController */

$routes->get('/login', function() {
    UserController::login();
});

$routes->post('/login', function() {
    UserController::handle_login();
});

$routes->get('/user/:id/user_edit', function($id) {
    UserController::edit($id);
});

$routes->post('/user/:id/user_edit',function($id) {
    UserController::update($id);
});

$routes->get('/user/:id/user_rights', function($id) {
    UserController::edit_rights($id);
});

$routes->post('/user/:id/user_rights',function($id) {
    UserController::update_rights($id);
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

/* rekisteröityminen
 * yllapitäjän näkymät & oikeudet
 * juomien ja ainesosien yhteys
 * haku
 * (ylläpitäjä ei pysty muokkaamaan käyttäjien tietoja)
 * (käyttäjäselailussa näkyy vain kirjautuneen tiedot)
 * */