<?php

namespace App\Controller;

use App\Repository\SoggettoRepository;
use App\Service\JsonSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private SoggettoRepository $soggettoRepository;
    private JsonSerializer $jsonSerializer;

    public function __construct(SoggettoRepository $soggettoRepository, JsonSerializer $jsonSerializer)
    {
        $this->soggettoRepository = $soggettoRepository;
        $this->jsonSerializer = $jsonSerializer;
    }

    /**
     * @Route("/api/ping", methods={"GET"})
     */
    public function ping()
    {
        return new JsonResponse(['text' => 'pong']);
    }

    /**
     * @Route("/api/soggetti", methods={"GET"})
     */
    public function getSoggetti()
    {
        return new JsonResponse($this->jsonSerializer->serializeToArray(
            $this->soggettoRepository->findAll()
        ));
    }

}