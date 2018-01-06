<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Rdv;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GestionRdvController extends Controller
{
    /**
     * @Route("/gestionrdv", name="gestion_rdv")
     * @Method("GET")
     */
    
    public function afficherpage()
    {
        // replace this line with your own code!
        return $this->render('rdv/rdv.html.twig');
    }
}