<?php
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
include 'db.php';

require 'vendor/autoload.php';

class MyWebSocketServer implements MessageComponentInterface {

    protected $clients;
    protected $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
        $this->db = new DB();
    }
    
    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $obj = json_decode($msg);
        $action = $obj->action;

        switch ($action) {
            case 'init':
                echo "Init action\n";
                $result = $this->db->getAllData();
                $from->send(json_encode(['action'=>$action, 'data'=>$result]));
                break;

            case 'add':
            case 'move':
                echo "Move action\n";
                $result = $this->db->dropEl($obj->data);
                if($result) {
                    foreach ($this->clients as $client) {
                        $client->send(json_encode($obj));
                    }
                }
                break;
                
            case 'remove':
                echo "Remove action\n";
                $result = $this->db->removeEl($obj->data);
                if($result) {
                    foreach ($this->clients as $client) {
                        $client->send(json_encode($obj));
                    }
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
