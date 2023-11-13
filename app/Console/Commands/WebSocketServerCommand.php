<?php

namespace App\Console\Commands;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Illuminate\Console\Command;
use App\Console\Handler\WebSocketHandler;

class WebSocketServerCommand extends Command
{
    protected $signature = 'websocket:serve';
    protected $description = 'Start the WebSocket server';

    public function handle()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketHandler() // Replace with your actual WebSocket handler class
                )
            ),
            9001 // Use the port you want
        );

        $this->info('WebSocket server started on port 9001.');

        $server->run();
    }
}
