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
            $juoma = new Juoma(array(
                'id' => $row['id'],
                'kayttaja_id' => $row['kayttaja_id'],
                'nimi' => $row['nimi'],
                'lisayspvm' => $row['lisayspvm'],
                'juomalaji' => $row['juomalaji'],
                'kuvaus' => $row['kuvaus']
            ));
            return $juoma;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Juoma (nimi, lisayspvm, lisaaja,'
                . ' juomalaji, kuvaus) VALUES (:nimi, :lisayspvm, :lisaaja,'
                . ' :juomalaji, :kuvaus) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'lisayspvm' => $this->lisayspvm,
            'lisaaja' => $this->kayttaja_id, 'juomalaji' => $this->juomalaji, 'kuvaus' => $this->kuvaus));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

}
