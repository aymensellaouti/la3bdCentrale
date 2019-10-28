<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    /**
     * @Route("/first", name="first")
     */
    public function index()
    {
        return $this->render('first/index.html.twig', [
            'name' => 'aymen',
        ]);
    }

    /**
     * @Route("/", name="accueil")
     */
    public function accueil() {
        return $this->render('first/accueil.html.twig');
    }
}
