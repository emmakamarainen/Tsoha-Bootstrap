<?php

class Juoma extends BaseModel {

    public $id, $kayttaja_id, $nimi, $lisayspvm, $juomalaji, $kuvaus;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_name', 'validate_juomalaji');
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
        $query = DB::connection()->prepare('INSERT INTO Juoma (nimi, lisayspvm, kayttaja_id,'
                . ' juomalaji, kuvaus) VALUES (:nimi, NOW(), :lisaaja,'
                . ' :juomalaji, :kuvaus) RETURNING id');
        $query->execute(array('nimi' => $this->nimi, 'lisaaja' => $this->kayttaja_id,
            'juomalaji' => $this->juomalaji, 'kuvaus' => $this->kuvaus));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Juoma WHERE id=:id');
        $query->execute(array('id' => $this->id));
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Juoma SET nimi = :nimi, '
                . 'juomalaji = :juomalaji, kuvaus = :kuvaus WHERE id=:id');
        $query->execute(array('id' => $this->id, 'nimi' => $this->nimi,
            'juomalaji' => $this->juomalaji, 'kuvaus' => $this->kuvaus));
    }

    public function validate_name() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->nimi) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä!';
        }
        return $errors;
    }
    
    public function validate_juomalaji() {
        $errors = array();
        if ($this->juomalaji == '' || $this->juomalaji == null) {
            $errors[] = 'Juomalaji ei saa olla tyhjä!';
        }
        if (strlen($this->juomalaji) < 3) {
            $errors[] = 'Juomalajin pituuden tulee olla vähintään kolme merkkiä!';
        }
        return $errors;
        
    }

}
