<?php

class User extends BaseModel {

    public $id, $nimimerkki, $salasana, $yllapitaja;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimimerkki', 'validate_salasana');
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
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

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
        $query->execute();
        $rows = $query->fetchAll();
        $users = array();

        foreach ($rows as $row) {
            $users[] = new User(array(
                'id' => $row['id'],
                'nimimerkki' => $row['nimimerkki'],
                'salasana' => $row['salasana'],
                'yllapitaja' => $row['yllapitaja']
            ));
        }
        return $users;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Kayttaja (nimimerkki, salasana, yllapitaja)'
                . 'VALUES (:nimimerkki, :salasana, :yllapitaja) RETURNING id');
        $query->execute(array('nimimerkki' => $this->nimimerkki, 'salasana' => $this->salasana,
            'yllapitaja' => $this->yllapitaja));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Kayttaja WHERE id=:id');
        $query->execute(array('id' => $this->id));
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET nimimerkki = :nimimerkki, salasana = :salasana WHERE id=:id');
        $query->execute(array('id' => $this->id, 'nimimerkki' => $this->nimimerkki, 'salasana' => $this->salasana));
    }

    public function update_rights() {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET yllapitaja = :yllapitaja, WHERE id=:id');
        $query->execute(array('id' => $this->id, 'yllapitaja' => $this->yllapitaja));
    }

    public static function authenticate($nimimerkki, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimimerkki = :nimimerkki AND salasana = :salasana LIMIT 1');
//        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE nimimerkki = \'Doku\' '
//                . 'AND salasana = \'alkkis\' LIMIT 1');
        $query->execute(array('nimimerkki' => $nimimerkki, 'salasana' => $salasana));
        $row = $query->fetch();
        Kint::dump($row);
        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimimerkki' => $row['nimimerkki'],
                'salasana' => $row['salasana'],
                'yllapitaja' => $row['yllapitaja'],
            ));
            return $user;
        } else {
            return null;
        }
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

    public static function check_admin($id) {
//        $id = $_SESSION['user'];
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimimerkki' => $row['nimimerkki'],
                'salasana' => $row['salasana'],
                'yllapitaja' => $row['yllapitaja'],
            ));
        }
        if ($user->yllapitaja == 1) {
            Kint::dump($user);
            return $user;
        }
    }

    public static function anna_oikeudet() {
        $query = DB::connection()->prepare('UPDATE Kayttaja SET yllapitaja = 1 WHERE id=:id');
        $query->execute(array('id' => $this->id, 'yllapitaja' => $this->yllapitaja));
    }

}
