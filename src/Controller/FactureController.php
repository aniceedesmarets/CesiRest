<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Facture;

use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

class FactureController extends Controller
{
    /**
     * @Route("/facture/")
     * @Method("POST")
     */
    public function ajouterFacture(Request $request)
    {
        $request->getMethod();
        $idClient=$request->get("id");
        $montantFacture=$request->get("montant");
        $etatFacture=$request->get("etat");
        $dateFacture=$request->get("date");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données
        
        $f=new \DateTime($dateFacture);
        
        $facture=new facture();
        $facture->setClient($client);
        $facture->setMontantFacture($montantFacture);
        $facture->setEtatFacture($etatFacture);
        $facture->setDateFacture($f);
        
        $em->persist($facture);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();   
        
        $reponse = new Response('Saved new facture with id '.$facture->getId()); 
        $reponse->headers->set('Access-Control-Allow-Origin', '*');
        return $reponse;
        }
        
     /**
     * @Route("/facture/{id}", name="supprimerfacture")
     * @Method("DELETE")
     */
    public function supprimerFacture($id)
    {
        $facture = $this->getDoctrine()
                ->getRepository(Facture::class)
                ->find($id);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->remove($facture);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('La facture a été supprimé : '.$id); 
    }
 
     /**
     * @Route("/facture/", name="modifierfacture")
     * @Method("PUT")
     */
    public function modifierFacture(Request $request)
    {
        
        $request->getMethod();
        $idFacture=$request->get("id");
        $montantFacture=$request->get("montant");
        $etatFacture=$request->get("etat");
        $dateFacture=$request->get("date");
        $idClient=$request->get("idcli");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $facture = $this->getDoctrine()
                ->getRepository(Facture::class)
                ->find($idFacture);
        $f=new \DateTime($dateFacture);
        
        $facture->setMontantFacture($montantFacture);
        $facture->setEtatFacture($etatFacture);
        $facture->setDateFacture($f);
        $facture->setClient($client);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($facture);

        $em->flush();

        return new Response('La facture a été mis à jour : '.$idFacture); 
        }

     /**
     * @Route("/facture/{id}")
     * @Method("GET")
     */
    public function voirFacture($id)
    {
        $facture = $this->getDoctrine()
                ->getRepository(Facture::class)
                ->find($id);
        
        $factureJson = $this->get("jms_serializer")->serialize($facture,"json");
        
        $reponse = new Response($factureJson);
        $reponse->headers->set('Access-Control-Allow-Origin', '*');
        
        return $reponse;
    }   
    
/**
     * @Route("/facture/")
     * @Method("GET")
     */
    public function voirToutFacture()
    {
        $factures = $this->getDoctrine()
                ->getRepository(Facture::class)
                ->findAll();
        
        $facturesJson = $this->get("jms_serializer")->serialize($factures,"json");
        
        $reponse = new Response($facturesJson);
        //$reponse->headers->set('Access-Control-Allow-Origin', '*');
        
        return $reponse;
    }
        
}