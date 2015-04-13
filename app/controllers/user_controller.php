<?php

require 'app/models/user.php';

class UserController extends BaseController {

    public static function login() {
        View::make('login.html');
    }

    public static function handle_login() {
        $params = $_POST;
        $user = User::authenticate($params['nimimerkki'], $params['salasana']);
        if (!$user) {
            View::make('login.html', array('error' => 'Väärä sdfgfdgfdgdfgfdgkäyttäjätunnus tai salasana!', 'nimimerkki' => $params['nimimerkki']));
        } else {
            $_SESSION['user'] = $user->id;
            Redirect::to('/home', array('message' => 'Tervetuloa takaisin ' . '!'));
            
        }
    }
    
    public static function edit($id) {
        $juoma = User::find($id);
        View::make('user/user_edit.html', array('user' => $user));
    }

    public static function update($id) {
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
            
        );
        // Alustus
        $user = new User($attributes);
        $errors = $user->errors();
        if (count($errors) > 0) {
            View::make('user/user_edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $user->update();
            Redirect::to('/user/' . $user->id, array('message' => 'Muokkaus onnistui.'));
        }
    }

}
