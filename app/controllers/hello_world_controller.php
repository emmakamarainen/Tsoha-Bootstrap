<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on kotisivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
    }
    
    public static function login(){
      // Testaa koodiasi täällä
      View::make('login.html');
    }
    
    public static function etusivu(){
      // Testaa koodiasi täällä
      View::make('etusivu.html');
    }
    
    public static function muokkaus(){
      // Testaa koodiasi täällä
      View::make('muokkaus.html');
    }
    
    public static function listaus(){
      // Testaa koodiasi täällä
      View::make('listaus.html');
    }
    
    public static function esittely(){
      // Testaa koodiasi täällä
      View::make('esittely.html');
    }
  }
