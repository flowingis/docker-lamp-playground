<?php

namespace App\Service;

use Stomp\Client;
use Stomp\SimpleStomp;
use Stomp\Transport\Bytes;

class StompMessageSender
{
    public function send(string $queue, string $message): string
    {
        $client = new Client($_ENV["STOMP_CONNECTIONSTRING"]);
        $client->setLogin($_ENV["STOMP_USERNAME"], $_ENV["STOMP_PASSWORD"]);
        $stomp = new SimpleStomp($client);
        $messageId = uniqid();
        $bytesMessage = new Bytes($message);
        $stomp->send($queue, $bytesMessage);

        return $messageId;
    }
}