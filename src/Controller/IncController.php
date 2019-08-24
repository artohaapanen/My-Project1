<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IncController extends AbstractController
{
    /**
     * @Route("/inc", name="inc")
     */
    public function index()
    {
        return $this->render('inc/index.html.twig', [
            'controller_name' => 'IncController',
        ]);
    }
}
