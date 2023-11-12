<?php

class DB {
    private $pdo;
    function __construct() {
        try {
            $p = new PDO("sqlite:./db.sqlite");
            $p->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $this->pdo = $p;
            try {
                $p->exec("CREATE TABLE IF NOT EXISTS garages (
                                id INTEGER PRIMARY KEY,
                                x INTEGER NOT NULL,
                                y INTEGER NOT NULL,
                                w INTEGER NOT NULL,
                                h INTEGER NOT NULL,
                                e INTEGER DEFAULT NULL
                            )");
            } catch (PDOException $e) {
                die("Table creation failed: " . $e->getMessage());
            }
        
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    public function getAllData() {
        try {
            $stmt = $this->pdo->query('SELECT * FROM garages');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function dropEl($data) {
        try {
            $trId = $data->trId;
            $elId = $data->elId;
            $affectedRows = $this->pdo->exec("UPDATE garages SET e = null WHERE e = '$elId'");
            $affectedRows = $this->pdo->exec("UPDATE garages SET e = '$elId' WHERE id = '$trId'");
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function trashEl($data) {
        try {
            $elId = $data->elId;
            $affectedRows = $this->pdo->exec("UPDATE garages SET e = null WHERE e = '$elId'");
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}