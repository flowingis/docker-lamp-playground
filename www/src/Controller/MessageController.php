<?php

namespace App\Controller;

<<<<<<< HEAD
use App\Service\StompMessageSender;
use Stomp\Exception\StompException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
=======
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
>>>>>>> 2e401ef5e1a5e300eb11470a77d9c44edbc87be4
use Symfony\Component\Routing\Annotation\Route;
use Stomp\Client;
use Stomp\SimpleStomp;
use Stomp\Transport\Bytes;

class MessageController extends AbstractController
{
<<<<<<< HEAD
    private StompMessageSender $sender;

    public function __construct(StompMessageSender $sender)
    {
        $this->sender = $sender;
    }
=======
>>>>>>> 2e401ef5e1a5e300eb11470a77d9c44edbc87be4

    /**
     * @Route("/message/test", methods={"GET"})
     */
    public function test()
    {
<<<<<<< HEAD
        try {
            $messageId = $this->sender->send(
                '/queue/test',
                'Messaggio di prova inviato da Symfony');

            return new JsonResponse(['messageId' => $messageId]);
        } catch (StompException $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
=======
        $client = new Client('tcp://artemis:61613');
        $client->setLogin("admin", "admin");
        $stomp = new SimpleStomp($client);
        $messageId = uniqid();
        $body = "messaggio di prova inviato da un controller Symfony (id: $messageId)";
        $bytesMessage = new Bytes($body);
        $stomp->send('/queue/test', $bytesMessage);

        return new JsonResponse(['message sent' => $messageId]);
>>>>>>> 2e401ef5e1a5e300eb11470a77d9c44edbc87be4
    }

}