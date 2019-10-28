<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class SessionController extends AbstractController
{
    /**
     * @Route("/session", name="session")
     */
    public function index(Request $request)
    {
        $session = $request->getSession();
        if( ! $session->has('listeInscrits')) {
            $listInscrits = array(
                "mohamed"
            );
            $session->set('listeInscrits', $listInscrits);
        }
        return $this->render('session/index.html.twig', [
            'controller_name' => 'SessionController',
        ]);
    }
}
