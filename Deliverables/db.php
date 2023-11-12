<?php
// SQLite database file path
$dbFile = './db.sqlite';

try {
    // Create a PDO connection to the SQLite database
    $pdo = new PDO("sqlite:$dbFile");

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected to the SQLite database successfully\n";

    try {
        // Create a table if it doesn't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS garages (
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

function getAllData() {
    try {
        $stmt = $pdo->query('SELECT * FROM garages');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        return [];
    }
}

function dropEl($data) {
    try {
        $trId = $data->trId;
        $elId = $data->elId;
        $affectedRows = $pdo->exec("UPDATE garages SET e = null WHERE e = $elId");
        $affectedRows = $pdo->exec("UPDATE garages SET e = $elId WHERE id = $trId");
        return true;
    } catch (PDOException $e) {
        return false;
    }
}