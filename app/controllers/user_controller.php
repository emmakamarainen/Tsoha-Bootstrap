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

}
