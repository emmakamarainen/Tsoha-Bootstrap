<?php

require 'app/models/juoma.php';
require 'app/models/ainesosa.php';
require 'app/models/user.php';

class JuomatController extends BaseController {

    public static function drink_list() {
        self::check_logged_in();
        $juomat = Juoma::all();
        View::make('drink/drink_list.html', array('juomat' => $juomat));
    }

    public static function store() {
        self::check_logged_in();
        $params = $_POST;
        
        $attributes = array(
            'nimi' => $params['nimi'],
//            'lisayspvm' => $params['lisayspvm'],
            'kayttaja_id' => 1,
            //'ainesosat' => $params['ainesosat'],
            'juomalaji' => $params['juomalaji'],
            'kuvaus' => $params['kuvaus'],
        );

        $juoma = new Juoma($attributes);
        $errors = $juoma->errors();
        if (count($errors) == 0) {
            $juoma->save();
            Redirect::to('/drink/' . $juoma->id, array('message' => 'Juoma lisätty!'));
        } else {
            View::make('drink/drink_new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function drink_new() {
        self::check_logged_in();
        View::make('drink/drink_new.html');
    }

    public static function login() {
        View::make('login.html');
    }

    public static function home() {
        View::make('home.html');
    }

    public static function search() {
        self::check_logged_in();
        View::make('drink/drink_search.html');
    }

    public static function drink_show($id) {
        self::check_logged_in();
        $juoma = Juoma::find($id);
        View::make('drink/drink_show.html', array('juoma' => $juoma));
    }

    public static function edit($id) {
        self::check_logged_in();
        $juoma = Juoma::find($id);
        View::make('drink/drink_edit.html', array('juoma' => $juoma));
    }

    public static function update($id) {
        self::check_logged_in();
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'nimi' => $params['nimi'],
//            'lisayspvm' => date[yy-mm-dd],
            'kayttaja_id' => 1,
//            'ainesosat' => $params['ainesosat'],
            'juomalaji' => $params['juomalaji'],
            'kuvaus' => $params['kuvaus']
        );
// Alustus
        $juoma = new Juoma($attributes);
        $errors = $juoma->errors();
        if (count($errors) > 0) {
            View::make('drink/drink_edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $juoma->update();
            Redirect::to('/drink/' . $juoma->id, array('message' => 'Muokkaus onnistui.'));
        }
    }

    public static function destroy($id) {
        self::check_logged_in();
        $juoma = new Juoma(array('id' => $id));
        $juoma->destroy();
        Redirect::to('/drink_list', array('message' => 'Poistettu.'));
    }

    public static function drink_name($nimi) {
        self::check_logged_in();
        $juomat = Juoma::hae_juomannimi($nimi);
        View::make('drink/drink_list.html', array('juomat' => $juomat));
    }
}
