<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecondController extends AbstractController
{
    /**
     * @Route("/second", name="second")
     */
    public function index()
    {
        return $this->render('second/index.html.twig', [
            'controller_name' => 'SecondController',
        ]);
    }

    /**
     * @Route("/second/{name}")
     */
    public function show(Request $request, $name) {
        return $this->render('second/index.html.twig', array(
            'nom' => 'Sellaouti',
            'prenom' => $name
        ));
    }
}
