<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Client;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RdvRepository")
 */
class Rdv
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
    private $jourRdv;
    
     /**
     * @ORM\Column(type="integer")
     */
    private $heureRdv;
    
    function getJourRdv() {
        return $this->jourRdv;
    }

    function getHeureRdv() {
        return $this->heureRdv;
    }

    function setJourRdv($jourRdv) {
        $this->jourRdv = $jourRdv;
    }

    function setHeureRdv($heureRdv) {
        $this->heureRdv = $heureRdv;
    }

    function getId() {
        return $this->id;
    }

   
    function setId($id) {
        $this->id = $id;
    }

    

}
