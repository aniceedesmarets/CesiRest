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
    private $id;
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
    
    function getId() {
        return $this->id;
    }

    function getNomClient() {
        return $this->nomClient;
    }

    function getPrenomClient() {
        return $this->prenomClient;
    }

    function getTelClient() {
        return $this->telClient;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNomClient($nomClient) {
        $this->nomClient = $nomClient;
    }

    function setPrenomClient($prenomClient) {
        $this->prenomClient = $prenomClient;
    }

    function setTelClient($telClient) {
        $this->telClient = $telClient;
    }

        // add your own fields
    
}
