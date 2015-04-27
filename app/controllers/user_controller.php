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
            View::make('login.html', array('message_red' => 'Väärä nimimerkki tai salasana!'));
        } else {
            $_SESSION['user'] = $user->id;
            Redirect::to('/home', array('message_green' => 'Tervetuloa takaisin ' . $user->nimimerkki . '!'));
        }
    }

    public static function user_show($id) {
        $user = User::find($id);
        View::make('user/user_show.html', array('user' => $user));
    }

    public static function edit($id) {
        $user = User::find($id);
        View::make('user/user_edit.html', array('user' => $user));
    }

    public static function edit_rights($id) {
        $user = User::find($id);
        View::make('user/user_rights.html', array('user' => $user));
    }

    public static function update($id) {
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
        );
        $user = new User($attributes);
        $errors = $user->errors();
        if (count($errors) > 0) {
            View::make('user/user_edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $user->update();
            Redirect::to('/user/' . $user->id, array('message_green' => 'Muokkaus onnistui.'));
        }
    }

    public static function update_rights($id) {
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
            'yllapitaja' => $params['yllapitaja'],
        );
        $user = new User($attributes);
        $errors = $user->errors();
        if (count($errors) > 0) {
            View::make('user/user_rights.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $user->update_rights();
            Redirect::to('/user/' . $user->id, array('message_green' => 'Muokkaus onnistui.'));
        }
    }

    public static function destroy($id) {
        $user = new User(array('id' => $id));
        $user->destroy();
        Redirect::to('/home', array('message_red' => 'Poistettu.'));
    }

    public static function user_list() {
        $users = User::all();
        View::make('user/user_list.html', array('users' => $users));
    }

    public static function store() {
        $params = $_POST;
        $attributes = array(
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
            'yllapitaja' => 0
        );

        $user = new User($attributes);
        $errors = $user->errors();
        if (count($errors) == 0) {
            $user->save();
            $_SESSION['user'] = $user->id;
            Redirect::to('/home', array('message_green' => 'Tervetuloa' . $user->nimimerkki . '!'));
        } else {
            View::make('user/user_new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function user_new() {
        View::make('user/user_new.html');
    }

    public static function logout() {
        $_SESSION['user'] = null;
        Redirect::to('/login', array('message_red' => 'Olet kirjautunut ulos!'));
    }

}
