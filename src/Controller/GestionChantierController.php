<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Chantier;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class GestionChantierController extends Controller
{
    /**
     * @Route("/gestionchantier", name="gestion_chantier")
     * @Method("GET")
     */
    
    public function afficherpage()
    {
        // replace this line with your own code!
        return $this->render('chantier/chantier.html.twig');
    }
}