<?php

class AineetController extends BaseController {

    public static function aine_list() {
        $aineet = Ainesosa::all();
        View::make('aine/aine_list.html', array('aineet' => $aineet));
    }

    public static function aine_show($id) {
        $aine = Ainesosa::find($id);
        View::make('aine/aine_show.html', array('aine' => $aine));
    }

    public static function aine_new($drink_id) {
        View::make('aine/aine_new.html', array('drink_id' => $drink_id));
    }

    public static function drink_aine_store($id) {
        $params = $_POST;
        $ainesosa = Ainesosa::haeNimella($params['ainesosa']);
        if ($ainesosa) {
            $ainesosa->addToDrink($id);
        } else {
            $attributes = array(
                'ainesosa' => $params['ainesosa']
            );
            $ainesosa = new Ainesosa($attributes);
            $errors = $ainesosa->errors();
            if (count($errors) == 0) {
                $ainesosa->save();
                $ainesosa->addToDrink($id);
                Redirect::to('/drink_list', array('message_green' => 'Lisätty.'));
            } else {
                View::make('aine/aine_new.html', array('errors' => $errors, 'attributes' => $attributes));
            }
        }
        Redirect::to('/drink_list', array('message_green' => 'Lisätty.'));
    }

    public static function destroy($id) {
        $ainesosa = new Ainesosa(array('id' => $id));
        $ainesosa->destroy();
        Redirect::to('/aine_list', array('message_red' => 'Poistettu.'));
    }

    public static function update($id) {
        $params = $_POST;
        $attributes = array(
            'id' => $id,
            'ainesosa' => $params['nimi']
        );
        $ainesosa = new Ainesosa($attributes);
        $errors = $ainesosa->errors();
        if (count($errors) > 0) {
            View::make('aine/aine_edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $ainesosa->update();
            Redirect::to('/aine_list' . $ainesosa->id, array('message_green' => 'Muokkaus onnistui.'));
        }
    }

}
