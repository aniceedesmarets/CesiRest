<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
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
     * @ORM\Column(type="integer")
     */
    private $montantFacture;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $etatFacture;
    /**
     * @ORM\Column(type="date")
     */
    private $dateFacture;

    // add your own fields
    function getId() {
        return $this->id;
    }

    function getMontantFacture() {
        return $this->montantFacture;
    }

    function getEtatFacture() {
        return $this->etatFacture;
    }

    function getDateFacture() {
        return $this->dateFacture;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMontantFacture($montantFacture) {
        $this->montantFacture = $montantFacture;
    }

    function setEtatFacture($etatFacture) {
        $this->etatFacture = $etatFacture;
    }

    function setDateFacture($dateFacture) {
        $this->dateFacture = $dateFacture;
    }


}
