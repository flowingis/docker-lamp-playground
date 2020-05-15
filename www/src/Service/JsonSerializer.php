<?php

namespace App\Service;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class JsonSerializer
{
    private array $encoders;
    private array $normalizers;
    private Serializer $serializer;

    public function __construct()
    {
        $this->encoders = [new JsonEncoder()];
        $this->normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
    }

    public function serializeToArray($data): array
    {
        return json_decode($this->serializer->serialize($data, 'json'), true);
    }
}