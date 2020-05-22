<?php

namespace App\Controller;

use App\Service\StompMessageSender;
use Stomp\Exception\StompException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    private StompMessageSender $sender;

    public function __construct(StompMessageSender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @Route("/message/test", methods={"GET"})
     */
    public function test()
    {
        try {
            $messageId = $this->sender->send(
                '/queue/test',
                'Messaggio di prova inviato da Symfony');

            return new JsonResponse(['messageId' => $messageId]);
        } catch (StompException $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $client = new Client('tcp://artemis:61613');
        $client->setLogin("admin", "admin");
        $stomp = new SimpleStomp($client);
        $messageId = uniqid();
        $body = "messaggio di prova inviato da un controller Symfony (id: $messageId)";
        $bytesMessage = new Bytes($body);
        $stomp->send('/queue/test', $bytesMessage);

        return new JsonResponse(['message sent' => $messageId]);
    }

}