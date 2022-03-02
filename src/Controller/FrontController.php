<?php

namespace App\Controller;

use App\Repository\BouleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    #[Route("/", name: "front")]
    public function index(BouleRepository $bouleRepository): Response
    {
        $boules = $bouleRepository->findAll();
        return $this->render("front/index.html.twig", [
            "boules" => $boules,
            "page" => "accueil"
        ]);
    }

    #[Route("/boule/{id}", name: "boule_presentation")]
    public function boule(BouleRepository $bouleRepository, $id): Response
    {
        $boules = $bouleRepository->find($id);
        $promotion =($boules->getPromotion()/100);
        return $this->render("front/boule_presentation.html.twig", [
            "boules" => $boules,
            "id" => $id,
            "promotion" => $promotion,
            "page" => "boule_présentation"
        ]);
    }


}