<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     * @Method("GET")
     */
    public function afficherabout()
    {
        // replace this line with your own code!
        return $this->render('about/about.html.twig');
}
}