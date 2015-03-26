<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

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
  
  $routes->get('/drink_edit', function() {
    JuomatController::drink_edit();
  });
  
  $routes->get('/drink_list', function() {
    JuomatController::drink_list();
  });
  
  $routes->get('/login', function() {
    JuomatController::login();
  });

  
  $routes->get('/drink/:id', function($id) {
    JuomatController::show($id);
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
  

