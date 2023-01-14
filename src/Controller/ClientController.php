<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/",name="client")
     */

    public function homepage(EntityManagerInterface $entityManager): Response
    {

        $clientRepo = $entityManager->getRepository(Client::class);
        $clients = $clientRepo->findAll();
 
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
        $clients = [
            [
                "id" => "0",
                "nom" => "a",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
            [
                "id" => "1",
                "nom" => "t",
                "prenom" => "t",
                "phone" => "0123456789",
            ],
            [
                "id" => "2",
                "nom" => "o",
                "prenom" => "m",
                "phone" => "0123456789",
            ],
            [
                "id" => "3",
                "nom" => "p",
                "prenom" => "b",
                "phone" => "0123456789",
            ],
        ];

        return $this->json($clients[$clientid]);

        return new Response("browse:$clientid");
        // return $this->render('$0.html.twig', []);
    }

    /**
     * @Route("/newclient", name="newclient")
     */
    public function newClient(Request $request, EntityManagerInterface $entityManager): Response
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('client');
        }

        return $this->render('/client/nouveauClient.html.twig', ['form' => $form,]);
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
