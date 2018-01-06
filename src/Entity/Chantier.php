<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChantierRepository")
 */
class Chantier
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="date")
     */
    private $datedebutChantier;
    /**
     * @ORM\Column(type="integer")
     */
    private $dureeChantier;

    function getId() {
        return $this->id;
    }

    function getDatedebutChantier() {
        return $this->datedebutChantier;
    }

    function getDureeChantier() {
        return $this->dureeChantier;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDatedebutChantier($datedebutChantier) {
        $this->datedebutChantier = $datedebutChantier;
    }

    function setDureeChantier($dureeChantier) {
        $this->dureeChantier = $dureeChantier;
    }



}
