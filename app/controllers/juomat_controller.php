<?php

require 'app/models/juoma.php';
require 'app/models/ainesosa.php';

class JuomatController extends BaseController {

    public static function drink_list() {
        $juomat = Juoma::all();
        View::make('drink/drink_list.html', array('juomat' => $juomat));
    }

    public static function store() {
        $params = $_POST;
        $juoma = new Juoma(array(
            'nimi' => $params['nimi'],
            'lisayspvm' => $params['lisayspvm'],
            'kayttaja_id' => $params['kayttaja_id'],
            'ainesosat' => $params['ainesosat'],
            'juomalaji' => $params['juomalaji'],
            'kuvaus' => $params['kuvaus'],
        ));

        $juoma->save();
        Redirect::to('/drink' . $juoma->id, array('message' => 'Juoma lisätty!'));
    }

    public static function drink_new() {
        View::make('drink/drink_new.html');
    }

    public static function login() {
        View::make('login.html');
    }

    public static function home() {
        View::make('home.html');
    }

//    Drinkin muokkaussivu id:n mukaan
//    public static function drink_edit($id) {
//        View::make('drink/drink_edit.html');
//    }
    
    public static function drink_edit() {
        View::make('drink/drink_edit.html');
    }

    
    public static function drink_show($id) {
        $juoma = Juoma::find($id);
        $aine = Ainesosa::find($id);
        View::make('drink/drink_show.html', array('juoma' => $juoma, 'aine' => $aine));
    }
    
    public static function aine_list() {
        $aineet = Ainesosa::all();
        View::make('aine/aine_list.html', array('aineet' => $aineet));
    }
    
    public static function edit($id) {
        $juoma = Juoma::find($id);
        View::make('drink/edit.html', array('attributes' => $juoma));
    }
    
    public static function update($id){
    $params = $_POST;

    $attributes = array(
        'id' => $id,
        'nimi' => $params['nimi'],
        'lisayspvm' => $params['lisayspvm'],
        'kayttaja_id' => $params['kayttaja_id'],
        'ainesosat' => $params['ainesosat'],
        'juomalaji' => $params['juomalaji'],
        'kuvaus' => $params['kuvaus'],
    );
    
    // Alustus
    $juoma = new Juoma($attributes);
    $errors = $juoma->errors();

    if(count($errors) > 0){
      View::make('drink/edit.html', array('errors' => $errors, 'attributes' => $attributes));
    }else{
      $juoma->update();

      Redirect::to('/drink/' . $juoma->id, array('message' => 'Muokkaus onnistui.'));
      }
    }
    
    public static function destroy($id){
    $juoma = new Juoma(array('id' => $id));
    $juoma->destroy();
    Redirect::to('/drink', array('message' => 'Poistettu.'));
  }
    
}
