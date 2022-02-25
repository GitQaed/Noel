<?php

namespace App\Controller;

use App\Repository\BouleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    #[Route('/', name: 'front')]
    public function index(BouleRepository $bouleRepository): Response
    {
        $boules = $bouleRepository->findAll();
        return $this->render('front/index.html.twig', [
            'boules' => $boules,
        ]);
    }

    #[Route('/boule/{boule}', name: 'boule_presentation')]
    public function boule($boule): Response
    {
        
        return $this->render('front/boule_presentation.html.twig', [
            "boule" => $boule
        ]);
    }


}