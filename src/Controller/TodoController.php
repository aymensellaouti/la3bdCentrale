<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/todo")
 */
class TodoController extends AbstractController
{
    /**
     * @Route("/", name="todo")
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

    /**
     * @Route(
     *     "/add/{name}/{content<\d+>}",
     *      name="todo.add"
     * )
     */
    public function add(Request $request, $name, $content) {
        /*
         * Si la session existe
         *  si non
         *      message erreur
         *
         *  si oui
         *      si le name existe
         *          erreur flashbag
         *
         *      sinon
         *          ajoute
         *          succes
         *  finsi
         *  forward
         */
        $session = $request->getSession();
        // si la session contient tableau de todo
        // si non
        if(!$session->has('todos')){
            $session->getFlashBag()->add('error', 'session innexistante');
        } else {
            $todos = $session->get('todos');
            if (isset($todos[$name])) {
                $session->getFlashBag()->add('error', "$name existe déjà");
            } else {
                $todos[$name] = $content;
                $session->set('todos',$todos);
                $session->getFlashBag()->add('success', "$name ajouté avec succès");
            }
        }
        return $this->redirectToRoute('todo');
    }

    /**
     * @Route("/update/{name}/{content}", name="todo.update")
     */
    public function update(Request $request, $name, $content) {
        /*
         * Si la session existe
         *  si non
         *      message erreur
         *
         *  si oui
         *      si le name n'existe pas
         *          erreur flashbag
         *
         *      sinon
         *          met a jour
         *          succes
         *  finsi
         *  forward
         */
        $session = $request->getSession();
        // si la session contient tableau de todo
        // si non
        if(!$session->has('todos')){
            $session->getFlashBag()->add('error', 'session innexistante');
        } else {
            $todos = $session->get('todos');
            if (!isset($todos[$name])) {
                $session->getFlashBag()->add('error', "$name n'existe pas");
            } else {
                $todos[$name] = $content;
                $session->set('todos',$todos);
                $session->getFlashBag()->add('success', "$name mis à jour avec succès");
            }
        }
        return $this->redirectToRoute('todo');
    }

    /**
     * @Route("/delete/{name}", name="todo.delete")
     */
    public function delete(Request $request, $name) {
        /*
         * Si la session existe
         *  si non
         *      message erreur
         *
         *  si oui
         *      si le name n'existe pas
         *          erreur flashbag
         *
         *      sinon
         *          delete
         *          succes
         *  finsi
         *  forward
         */
        $session = $request->getSession();
        // si la session contient tableau de todo
        // si non
        if(!$session->has('todos')){
            $session->getFlashBag()->add('error', 'session innexistante');
        } else {
            $todos = $session->get('todos');
            if (!isset($todos[$name])) {
                $session->getFlashBag()->add('error', "$name n'existe pas");
            } else {
                unset($todos[$name]);
                $session->set('todos',$todos);
                $session->getFlashBag()->add('success', "$name supprimé avec succès");
            }
        }
        return $this->redirectToRoute('todo');
    }
}
