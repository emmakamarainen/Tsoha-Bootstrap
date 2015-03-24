<?php

class Juoma extends BaseModel {

    public $id, $kayttaja_id, $nimi, $lisayspvm, $juomalaji, $kuvaus;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Juoma');
        $query->execute();
        $rows = $query->fetchAll();
        $juomat = array();

        foreach ($rows as $row) {
            $juomat[] = new Juoma(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'lisayspvm' => $row['lisayspvm'],
                'juomalaji' => $row['juomalaji'],
                'kuvaus' => $row['kuvaus']
            ));
        }
        return $juomat;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Juoma WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $juomat[] = new Juoma(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'lisayspvm' => $row['lisayspvm'],
                'juomalaji' => $row['juomalaji'],
                'kuvaus' => $row['kuvaus']
            ));
            return $juomat;
        }
        return null;
    }

}
