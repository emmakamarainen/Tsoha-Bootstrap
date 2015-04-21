<?php

class BaseController {

    public static function get_user_logged_in() {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
            $user = User::find($user_id);
            return $user;
        }
        return null;
    }

    public static function check_logged_in() {
        if (!isset($_SESSION['user'])) {
            Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
        }
    }

    public static function check_admin() {
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user'];
            $user = User::find($user_id);
            $admin = User::check_admin($_SESSION['user']);
            View::make('sivu.html', array('admin' => $admin));
            if ($user->yllapitaja == TRUE) {
                return $user;
            }
            return null;
        }
    }

}
