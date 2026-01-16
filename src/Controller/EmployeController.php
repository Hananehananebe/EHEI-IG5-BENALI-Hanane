<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Employe;       
use App\Form\EmployeType;

class EmployeController extends AbstractController
{
    #[Route('/employe/{name}', name: 'app_employe')]
    public function index(string $name): Response
    {
        return $this->render('employe/index.html.twig', [
            'name' => $name,
        ]);
    }

    #[Route(path: '/home', name: 'app_home')]
    public function home(): Response
    {
        $text = "Hello This is home !";
        $tabYear = [2020, 2021, 2022, 2023];

        return $this->render(view: 'employe/home.html.twig', parameters: [
            "text" => $text,
            "years" => $tabYear
        ]);
    }


    #[Route('/news', name: 'app_news')]
    public function news(): Response
    {
        return $this->render('employe/news.html.twig', [
            'titre' => 'Nos Actualités'
        ]);
    }

   
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('employe/contact.html.twig');
    }

   
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('employe/about.html.twig');
    }

    #[Route('/add-employe', name: 'app_employe_add')]
    public function addEmploye(Request $request): Response
    {
        $employe = new Employe();
        $employeform = $this->createForm(EmployeType::class, $employe);
        
        $employeform->handleRequest($request);

      
        if ($employeform->isSubmitted() && $employeform->isValid()) {
            
         // Dump 
          
           // {dd($employe);}



            return $this->render('employe/success.html.twig', [
                'employe' => $employe
            ]);
        }

        
        return $this->render('employe/add.html.twig', [
            'employeForm' => $employeform,
        ]);
    } 

}