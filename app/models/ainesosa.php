<?php

class Ainesosa extends BaseModel {
    
    public $id, $ainesosa; 
    
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_ainesosa');
    }
    
    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Ainesosat');
        $query->execute();
        $rows = $query->fetchAll();
        $aineet = array();
        foreach ($rows as $row) {
            $aineet[] = new Ainesosa(array(
                'id' => $row['id'],
                'ainesosa' => $row['ainesosa']           
            ));
        }
        return $aineet;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Ainesosat WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $aine = new Ainesosa(array(
                'id' => $row['id'],
                'ainesosa' => $row['ainesosa'] 
            ));
            return $aine;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Ainesosat (ainesosa) VALUES (:ainesosa) RETURNING id');
        $query->execute(array('ainesosa' => $this->ainesosa));
        $row = $query->fetch();
        $this->id = $row['id'];
    }
    
   
    
    public function validate_ainesosa() {
        $errors = array();
        if ($this->ainesosa == '' || $this->ainesosa == null) {
            $errors[] = 'Ainesosa ei saa olla tyhjä!';
        }
        if (strlen($this->ainesosa) < 3) {
            $errors[] = 'Ainesosan pituuden tulee olla vähintään kolme merkkiä!';
        }
        return $errors;
    }
}


