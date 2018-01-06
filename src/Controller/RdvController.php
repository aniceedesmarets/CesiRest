<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Rdv;

use Symfony\Component\HttpFoundation\JsonResponse;



use Symfony\Component\HttpFoundation\Request;

class RdvController extends Controller
{
    /**
     * @Route("/rdv/", name="rdv")
     * @Method("POST")
     */
    public function ajoutRdv(Request $request)
    {
        $request->getMethod();
        $idClient=$request->get("id");
        $dateRdv=$request->get("date");
        $heureRdv=$request->get("heure");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données
        
        
        $f=new \DateTime($dateRdv);
        
        $rdv=new rdv();
        $rdv->setClient($client);
        $rdv->setJourRdv($f);
        $rdv->setHeureRdv($heureRdv);
        
        $em->persist($rdv);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new rdv with id '.$rdv->getId()); 
        }
        
     /**
     * @Route("/rdv/{id}")
     * @Method("DELETE")
     */
    public function deleteRdv($id)
    {
        $rdv = $this->getDoctrine()
                ->getRepository(Rdv::class)
                ->find($id);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->remove($rdv);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Le rdv a été supprimé : '.$id); 
        }
        
    /**
     * @Route("/rdv/", name="modifierrdv")
     * @Method("PUT")
     */
    public function modifierRdv(Request $request)
    {
        
        $request->getMethod();
        $idRdv=$request->get("id");
        $dateRdv=$request->get("date");
        $heureRdv=$request->get("heure");
        $idClient=$request->get("idcli");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        
        $rdv = $this->getDoctrine()
                ->getRepository(Rdv::class)
                ->find($idRdv);
        $f=new \DateTime($dateRdv);
        
        $rdv->setJourRdv($f);
        $rdv->setHeureRdv($heureRdv);
        $rdv->setClient($client);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($rdv);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Le rdv a été mis à jour : '.$idRdv); 
        }

        
     /**
     * @Route("/rdv/{id}")
     * @Method("GET")
     */
    public function voirRdv($id)
    {
        $rdv = $this->getDoctrine()
                ->getRepository(Rdv::class)
                ->find($id);
        
        $rdvJson = $this->get("jms_serializer")->serialize($rdv,"json");
        
        return new Response($rdvJson);
    }   
    
/**
     * @Route("/rdv/")
     * @Method("GET")
     */
    public function voirToutRdv()
    {
        $rdvs = $this->getDoctrine()
                ->getRepository(Rdv::class)
                ->findAll();
        
        $rdvsJson = $this->get("jms_serializer")->serialize($rdvs,"json");
        
        return new Response($rdvsJson);
    }
        
}