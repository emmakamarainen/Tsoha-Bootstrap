<?php

class User extends BaseModel {

    public $id, $nimimerkki, $salasana, $yllapitaja;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimimerkki, validate_salasana');
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimimerkki = :nimimerkki '
                . '. AND salasana = :salasana LIMIT 1', array('nimimerkki' => $nimimerkki, 'salasana' => $salasana));
        $query->execute();
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimimerkki' => $row['nimimerkki'],
                'salasana' => $row['salasana'],
                'yllapitaja' => $row['yllapitaja'],
            ));
            return $user;
        }
        return null;
    }

    public static function destroy($id) {
        $user = new User(array('id' => $id));
        $user->destroy();
        Redirect::to('/', array('message' => 'Poistettu.'));
    }
    
    public function validate_nimimerkki() {
        $errors = array();
        if ($this->nimimerkki == '' || $this->nimimerkki == null) {
            $errors[] = 'Nimimerkki ei saa olla tyhjä!';
        }
        if (strlen($this->nimimerkki) < 3) {
            $errors[] = 'Nimimerkin pituuden tulee olla vähintään kolme merkkiä!';
        }
        return $errors;
    }
    
    public function validate_salasana() {
        $errors = array();
        if ($this->salasana == '' || $this->salasana == null) {
            $errors[] = 'Salasana ei saa olla tyhjä!';
        }
        if (strlen($this->salasana) < 5) {
            $errors[] = 'Salasanan pituuden tulee olla vähintään viisi merkkiä!';
        }
        return $errors;
        
    }

}
