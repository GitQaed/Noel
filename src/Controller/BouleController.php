<?php

namespace App\Controller;

use App\Entity\Boule;
use App\Form\BouleType;
use App\Repository\BouleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BouleController extends AbstractController
{
    #[Route("/boule", name: "boule")]
    public function index(BouleRepository $bouleRepository): Response
    {
        $boules = $bouleRepository->findAll();

        return $this->render("boule/index.html.twig", [
            "boules" => $boules,
            "page" => "liste_boule"

        ]);
    }


    #[Route("/ajout_boule", name: "ajout_boule")]
    public function ajoutBoule(Request $requete, EntityManagerInterface $manager): Response
    {
        $boule = new Boule();
        $form = $this->createForm(BouleType::class, $boule);
        $form->handleRequest($requete);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($boule);
            $manager->flush();

            $this->addFlash("success", "Produit ajouté en BDD");
            return $this->redirectToRoute("boule");

        }

        return $this->render("boule/ajout_boule.html.twig", ["form_boule" => $form->createView(), "page" => "ajout_boule"]);
    }



    #[Route("/modifier_boule/{id}", name: "modifier_boule")]
    public function modifierBoule(Boule $boule, Request $requete, EntityManagerInterface $manager): Response
    {

        $form = $this->createform(BouleType::class, $boule);

        $form->handleRequest($requete);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($boule);
            $manager->flush();
            
            $this->addFlash("success", "Le produit a été modifiée");
            return $this->redirectToRoute("boule");
        }

        return $this->render("boule/modifier_boule.html.twig", ["form_boule" => $form->createView(), "page" => "modifier_boule"]);

    }

    
    #[Route("/supprimer_boule/{id}", name: "supprimer_boule")]
    public function supprimerBoule(Boule $boule, EntityManagerInterface $manager): Response
    {
        
        $manager->remove($boule);
        $manager->flush();

        $this->addFlash("success", "Le produit a été supprimé");
        return $this->redirectToRoute("boule");

    }
}