<?php

require 'app/models/juoma.php';
require 'app/models/ainesosa.php';

class AineController extends BaseController {
    
    public static function aine_list() {
        $aineet = Ainesosa::all();
        View::make('aine/aine_list.html', array('aineet' => $aineet));
    }
    
    public static function aine_show($id) {        
        $aine = Ainesosa::find($id);
        View::make('aine/aine_show.html', array('aine' => $juoma));
    }
    
}

