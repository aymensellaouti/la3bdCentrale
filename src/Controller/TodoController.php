<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    /**
     * @Route("/todo", name="todo")
     */
    public function index(Request $request)
    {
        // Récupérer la session
        $session = $request->getSession();
        // si la session contient tableau de todo
        // si non
        if(!$session->has('todos')){
            $todos =array(
                'achat'=>'acheter clé usb',
                'cours'=>'Finaliser mon cours',
                'correction'=>'corriger mes examens'
            );
            $session->set('todos', $todos);
            // ajouter flashBagMessage Todo initialisé avec succés
            $session->getFlashBag()->add('info', 'session initialisé avec succés');
        }
        //Afficher la liste des todos
        return $this->render('todo/index.html.twig', [
            'controller_name' => 'TodoController',
        ]);
    }
}
