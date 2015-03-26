<?php

class JuomatController extends BaseController {

    public static function drink_list() {
        $juomat = Juoma::all();
        View::make('drink_list.html', array('juomat' => $juomat));
    }

    public static function store() {
        $param = $_POST;
        $juoma = new Juoma(array(
            'nimi' => $params['nimi'],
            'lisayspvm' => $params['lisayspvm'],
            'kayttaja_id' => $params['kayttaja_id'],
            'ainesosat' => $params['ainesosat'],
            'juomalaji' => $params['juomalaji'],
            'kuvaus' => $params['kuvaus'],
        ));

        $game->save();
        Redirect::to('/drink' . $juoma->id, array('message' => 'Juoma lisätty!'));
    }

    public static function drink_new() {
        View::make('/drink/drink_new.html');
    }

    public static function login() {
        View::make('login.html');
    }

    public static function home() {
        View::make('home.html');
    }

    public static function drink_edit() {
        View::make('drink_edit.html');
    }

    
    public static function show($id) {
        $juoma = Juoma::find($id);
        View::make('drink/show.html', array('juoma' => $juoma));
    }

}
