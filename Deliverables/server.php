<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';

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
                        f INTEGER DEFAULT 0
                    )");
        echo "Table created successfully\n";
    } catch (PDOException $e) {
        die("Table creation failed: " . $e->getMessage());
    }

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

class MyWebSocketServer implements MessageComponentInterface {
    public function onOpen(ConnectionInterface $conn) {
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        // echo "Received message: $msg\n";
        $obj = json_decode($msg);
        $from->send("Server received your message: $msg");
    }

    public function onClose(ConnectionInterface $conn) {
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new MyWebSocketServer()
        )
    ),
    12345
);

$server->run();
