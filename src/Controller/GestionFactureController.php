<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Facture;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GestionFactureController extends Controller
{
    /**
     * @Route("/gestionfacture", name="gestion_facture")
     * @Method("GET")
     */
    
    public function afficherpage()
    {
        // replace this line with your own code!
        return $this->render('facture/facture.html.twig');
    }
}