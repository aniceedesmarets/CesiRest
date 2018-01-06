<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Chantier;

use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

class ChantierController extends Controller
{
    /**
     * @Route("/chantier/")
     * @Method("POST")
     */
    public function ajouterChantier(Request $request)
    {
        $request->getMethod();
        $idClient=$request->get("id");
        $datedebutChantier=$request->get("datedebut");
        $dureeChantier=$request->get("duree");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données
        
        $f=new \DateTime($datedebutChantier);
        
        $chantier=new chantier();
        $chantier->setClient($client);
        $chantier->setDatedebutChantier($f);
        $chantier->setDureeChantier($dureeChantier);
        
        $em->persist($chantier);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();   
        
        $reponse = new Response('Saved new chantier with id '.$chantier->getId()); 
        $reponse->headers->set('Access-Control-Allow-Origin', '*');
        return $reponse;
        }
        
     /**
     * @Route("/chantier/{id}", name="supprimerchantier")
     * @Method("DELETE")
     */
    public function supprimerChantier($id)
    {
        $chantier = $this->getDoctrine()
                ->getRepository(Chantier::class)
                ->find($id);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->remove($chantier);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Le chantier a été supprimé : '.$id); 
    }
 
     /**
     * @Route("/chantier/", name="modifierchantier")
     * @Method("PUT")
     */
    public function modifierChantier(Request $request)
    {
        
        $request->getMethod();
        $idChantier=$request->get("id");
        $datedebutChantier=$request->get("datedebut");
        $dureeChantier=$request->get("duree");
        $idClient=$request->get("idcli");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $chantier = $this->getDoctrine()
                ->getRepository(Chantier::class)
                ->find($idChantier);
        $f=new \DateTime($datedebutChantier);
        
        $chantier->setDatedebutChantier($f);
        $chantier->setDureeChantier($dureeChantier);
        $chantier->setClient($client);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($chantier);

        $em->flush();

        return new Response('Le chantier a été mis à jour : '.$idChantier); 
        }

     /**
     * @Route("/chantier/{id}")
     * @Method("GET")
     */
    public function voirChantier($id)
    {
        $chantier = $this->getDoctrine()
                ->getRepository(Chantier::class)
                ->find($id);
        
        $chantierJson = $this->get("jms_serializer")->serialize($chantier,"json");
        
        $reponse = new Response($chantierJson);
        $reponse->headers->set('Access-Control-Allow-Origin', '*');
        
        return $reponse;
    }   
    
/**
     * @Route("/chantier/")
     * @Method("GET")
     */
    public function voirToutChantier()
    {
        $chantiers = $this->getDoctrine()
                ->getRepository(Chantier::class)
                ->findAll();
        
        $chantiersJson = $this->get("jms_serializer")->serialize($chantiers,"json");
        
        $reponse = new Response($chantiersJson);
        //$reponse->headers->set('Access-Control-Allow-Origin', '*');
        
        return $reponse;
    }
        
}