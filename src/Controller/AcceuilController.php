<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/", name="acceuil")
     */
    public function index(LivreRepository $livreRepo)
    {
        $liste_livres = $livreRepo->findAll();
        return $this->render('acceuil/index.html.twig', compact("liste_livres"));
        
        
    }
    /**
      * @Route("/", name="acceuil")
     */
    public function rech(LivreRepository $livreRepo, $auteur)
    {
        $liste_livres = $livreRepo->findByAuteur($auteur);
        return $this->render('acceuil/index.html.twig', compact("liste_livres"));
        
        
    }
     
}
