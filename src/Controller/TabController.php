<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    /**
     * @Route("/tab/{nb?5}", name="tab")
     */
    public function index($nb)
    {
        $tab = array();
        for ($i = 0; $i < $nb ; $i++) {
            $tab[$i] = rand(0,20);
        }
        return $this->render('tab/index.html.twig', array(
            'tableau' => $tab
        ));
    }
}
