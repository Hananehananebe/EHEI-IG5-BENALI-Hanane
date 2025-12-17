<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
   # #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

   #  #[Route('/welcome', name: 'app_welcome')]
    public function welcome(): Response
    {
       return new Response("Hello world ; Welcome to our site!"); 

    }

    #-------------------------------valeur par defaut---------------------

      #[Route('/bonjour/{nom}', name: 'app_bonjour')]
    public function bonjour(string $nom = "inconnu"): Response
    {
       return new Response("Hello ".$nom."!"); 

    }



     #[Route('/about/{age}', name: 'app_about')]
     public function about(int $age = 20): Response
    {
       return new Response("votre age est  ".$age."!"); 

    }

#---------------------------------requirement-----------------------------

   # #[Route('/note/{note}', name: 'app_note', requirements: ['note' => '\d+'])]
    public function note(int $note = 1): Response
    {
       return new Response("votre note est  ".$note."!"); 

    }    
}

