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
  
        $clients = ['client1','client2'];
        return $this->render('client/homepage.html.twig',[
            'title'=>'coucou',
            'clients'=>$clients,
        ]);
    }

    /**
     * @Route("/client/{clientid}", name="nouveauClient")
     */
    public function nouveauClient($clientid = null): Response
    {
        
        return new Response("browse:$clientid");
        // return $this->render('$0.html.twig', []);
    }
}
