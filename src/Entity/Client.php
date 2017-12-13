<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idClient;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomClient;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenomClient;
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telClient;

    // add your own fields
}
