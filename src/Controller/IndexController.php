<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
       return $this->render('index.html.twig',[
        
       ]);
    }
}