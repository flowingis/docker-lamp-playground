<?php

namespace App\Entity;

use App\Repository\SoggettoRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Void_;

/**
 * @ORM\Entity(repositoryClass=SoggettoRepository::class)
 */
class Soggetto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cognome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $indirizzo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    public function __construct(string $nome, string $cognome, string $indirizzo, string $email, int $id = null)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->indirizzo = $indirizzo;
        $this->email = $email;
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function getCognome(): ?string
    {
        return $this->cognome;
    }

    public function getIndirizzo(): ?string
    {
        return $this->indirizzo;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

}
