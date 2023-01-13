<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/",name="client")
     */

    public function homepage(): Response
    {
        
        $clients = [
            [
                "id" => "1",
                "nom" => "a",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
            [
                "id" => "2",
                "nom" => "t",
                "prenom" => "t",
                "phone" => "0123456789",
            ],
            [
                "id" => "3",
                "nom" => "o",
                "prenom" => "m",
                "phone" => "0123456789",
            ],
            [
                "id" => "4",
                "nom" => "p",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
        ];
        return $this->render('client/homepage.html.twig', [
            'title' => 'coucou',
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/client/{clientid}", name="detailClient")
 
     */
    public function detailClient($clientid = null): Response
    {

        return new Response("browse:$clientid");
        // return $this->render('$0.html.twig', []);
    }

    /**
     * @Route("/newclient", name="newclient")
     */
    public function newClient(): Response
    {
        return $this->render('/client/nouveauClient.html.twig', []);
    }


    /**
     * @Route("/api/clients", name="api_clients")
     * @method({"GET","HEAD"})
     */
    public function getClients(): Response
    {
        $clients = [
            [
                "id" => "1",
                "nom" => "a",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
            [
                "id" => "2",
                "nom" => "t",
                "prenom" => "t",
                "phone" => "0123456789",
            ],
            [
                "id" => "3",
                "nom" => "o",
                "prenom" => "m",
                "phone" => "0123456789",
            ],
            [
                "id" => "4",
                "nom" => "p",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
        ];
        
        return $this->json($clients);
    }
}
