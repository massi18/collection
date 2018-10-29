<?php

namespace App\Controller;

use App\Repository\OeuvreRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CollectionController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(OeuvreRepository $repo)
    {
        $oeuvres = $repo->findAll();
        return $this->render('collection/home.html.twig', [
            'oeuvres' => $oeuvres
        ]);
    }
}
