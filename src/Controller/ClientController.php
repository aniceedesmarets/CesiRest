<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\TwigBundle\TwigBundle;

$request = Request::createFromGlobals();

class ClientController extends Controller
{
    /**
     * @Route("/client/", name="ajouterclient")
     * @Method("POST")
     */
    public function ajouterClient(Request $request)
    {
        $request->getMethod();
        $nomClient=$request->get("nom");
        $prenomClient=$request->get("prenom");
        $telClient=$request->get("tel");
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        $client = new Client();
        $client->setNomClient($nomClient);
        $client->setPrenomClient($prenomClient);
        $client->setTelClient($telClient);

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($client);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new client with id '.$client->getId());
    }

    /**
     * @Route("/client/{id}", name="supprimerclient")
     * @Method("DELETE")
     */
    public function supprimerClient($id)
    {

        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($id);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->remove($client);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Le client a été supprimé : '.$id); 
    }
    
     /**
     * @Route("/client/{id}", name="voirclient")
     * @Method("GET")
     */
    public function voirClient($id)
    {
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($id);
        
        $clientJson = $this->get("jms_serializer")->serialize($client,"json");
        
        $reponse = new Response($clientJson);
        $reponse->headers->set('Access-Control-Allow-Origin','*');
        return $reponse;
    }
    
    /**
     * @Route("/client/")
     * @Method("GET")
     */
    public function voirToutClient()
    {
        $clients = $this->getDoctrine()
                ->getRepository(Client::class)
                ->findAll();
        
        $clientJson = $this->get("jms_serializer")->serialize($clients,"json");
        $reponse = new Response($clientJson);
        //return new Response($clientJson);
        
        return $reponse;
        //return $this->render('client/client.html.twig', array('clients' => $clientJson,));
    }

     /**
     * @Route("/client/", name="modifierclient")
     * @Method("PUT")
     */
    public function modifierClient(Request $request)
    {
        $request->getMethod();
        $idClient=$request->get("id");
        $nomClient=$request->get("nom");
        $prenomClient=$request->get("prenom");
        $telClient=$request->get("tel");
        
        $client = $this->getDoctrine()
                ->getRepository(Client::class)
                ->find($idClient);
        
        $client->setNomClient($nomClient);
        $client->setPrenomClient($prenomClient);
        $client->setTelClient($telClient);
        
        $em = $this->getDoctrine()->getManager();//méthode qui sauvegarde les données

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($client);
        
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Le client a été mis à jour : '.$idClient); 
        
    }
}
