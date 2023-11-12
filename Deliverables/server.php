<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require 'vendor/autoload.php';
require './db.php';

class MyWebSocketServer implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
    }
    
    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $obj = json_decode($msg);
        $action = $obj["action"];

        switch ($action) {
            case 'init':
                echo "Init action\n";
                $result = getAllData();
                $from->send(json_encode(['action'=>$action, 'data'=>$result]));
                break;

            case 'drop':
                echo "Drop action\n";
                $result = dropEl($obj["data"]);
                foreach ($this->clients as $client) {
                    $client->send(json_encode($obj));
                }
                break;

            default:
                break;
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
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

echo "WebSocket server running at http://localhost:12345\n";

$server->run();
