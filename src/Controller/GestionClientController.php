<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GestionClientController extends Controller
{
    /**
     * @Route("/gestionclient", name="gestion_client")
     * @Method("GET")
     */
    
    public function afficherpage()
    {
        // replace this line with your own code!
        return $this->render('client/client.html.twig');
    }
}