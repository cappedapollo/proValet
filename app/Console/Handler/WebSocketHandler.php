<?php

namespace App\Console\Handler;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use App\Models\Garage;

class WebSocketHandler implements MessageComponentInterface
{
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
        $action = $obj->action;

        switch ($action) {
            case 'init':
                echo "Init action\n";
                $result = Garage::all();
                $from->send(json_encode(['action'=>$action, 'data'=>$result]));
                break;

            case 'add':
            case 'move':
                echo "Move action\n";
                $result = Garage::where('e', $obj->data->elId)->update([
                    'e' => null
                ]);
                $result = Garage::where('id', $obj->data->trId)->update([
                    'e' => $obj->data->elId
                ]);
                if($result) {
                    foreach ($this->clients as $client) {
                        $client->send(json_encode($obj));
                    }
                }
                break;
                
            case 'remove':
                echo "Remove action\n";
                $result = Garage::where('e', $obj->data->elId)->update([
                    'e' => null
                ]);
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
