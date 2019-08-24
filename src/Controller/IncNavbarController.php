<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IncNavbarController extends AbstractController
{
    /**
     * @Route("/inc/navbar", name="inc_navbar")
     */
    public function index()
    {
        return $this->render('inc_navbar/index.html.twig', [
            'controller_name' => 'IncNavbarController',
        ]);
    }
}
