<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  $routes->get('/etusivu', function() {
    HelloWorldController::etusivu();
  });
  
  $routes->get('/muokkaus', function() {
    HelloWorldController::muokkaus();
  });
  
  $routes->get('/listaus', function() {
    HelloWorldController::listaus();
  });
  
  $routes->get('/esittely', function() {
    HelloWorldController::esittely();
  });
  
  $routes->get('/login', function() {
    HelloWorldController::login();
  });
  
  /*JuomatController*/
  
  $routes->get('/juoma', function() {
    JuomatController::index();
  });
  
  $routes->get('/', function() {
    JuomatController::esittely();
  });
  
  $routes->get('/esittely', function() {
    JuomatController::esittely();
  });
  
  $routes->get('/esittely/:id', function($id) {
    JuomatController::show($id);
  });
  

