<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JuomatController extends BaseController {

    public static function index() {
        $juomat = juoma::all();
        View::make('juoma/listaus.html', array('juomat' => $juomat));
    }

}
