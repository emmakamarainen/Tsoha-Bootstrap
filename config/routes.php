<?php


  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
    /*JuomatController*/
  
  $routes->get('/home', function() {
    JuomatController::home();
  });
  
  $routes->get('/', function() {
    JuomatController::home();
  });
  
  $routes->get('/drink/edit', function() {
    JuomatController::drink_edit();
  });
  
  $routes->get('/drink/:id/edit', function($id) {
    JuomatController::drink_edit($id);
  });
  
  $routes->post('/drink/:id/edit', function($id){
    JuomatController::update($id);
  });
  
  $routes->get('/drink_list', function() {
    JuomatController::drink_list();
  });
  
  $routes->get('/login', function() {
    JuomatController::login();
  });

  
  $routes->get('/drink/:id', function($id) {
    JuomatController::drink_show($id);
  });
  
  $routes->post('/drink', function() {
    JuomatController::store();
  });
  
  $routes->post('/drink_new', function() {
    JuomatController::drink_new();
  });
  
  $routes->get('/drink_new', function() {
    JuomatController::drink_new();
  });
  
  $routes->get('/aine_list', function() {
    JuomatController::aine_list();
  });
  
  $routes->post('/drink/:id/destroy', function($id){
    JuomatController::destroy($id);
  });
  

