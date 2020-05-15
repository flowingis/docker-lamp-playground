<?php

namespace App\Controller;

use Psr\Cache\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CacheController extends AbstractController
{
    private AdapterInterface $cache;

    public function __construct(AdapterInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @Route("/cache/putsample", methods={"GET"})
     * @throws InvalidArgumentException
     */
    public function putSampleValue()
    {
        $item = $this->cache->getItem("sample_key");
        $newValue = "sample_value_from_controller_" . uniqid();
        $item->set($newValue);
        $this->cache->save($item);
        return new JsonResponse(['sample_key' => $newValue]);
    }

    /**
     * @Route("/cache/getsample", methods={"GET"})
     * @throws InvalidArgumentException
     */
    public function getSampleValue()
    {
        $item = $this->cache->getItem("sample_key");
        if (!$item->isHit()) {
            $item->set("sample_value");
            $this->cache->save($item);
        }
        return new JsonResponse(['sample_key' => $item->get()]);
    }

}