<?php

require 'app/models/juoma.php';

class HelloWorldController extends BaseController {

    public static function index() {
        // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
        echo 'Tämä on kotisivu!';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä
        View::make('helloworld.html');
        $kola = Juoma::find(1);
        $juomat = Juoma::all();

        Kint::dump($juomat);
        Kint::dump($kola);
    }

    public static function login() {
        // Testaa koodiasi täällä
        View::make('login.html');
    }

    public static function home() {
        // Testaa koodiasi täällä
        View::make('home.html');
    }

    public static function drink_edit() {
        // Testaa koodiasi täällä
        View::make('drink_edit.html');
    }

    public static function drink_list() {
        // Testaa koodiasi täällä
        View::make('drink_list.html');
    }

    public static function show() {
        // Testaa koodiasi täällä
        View::make('show.html');
    }

}
