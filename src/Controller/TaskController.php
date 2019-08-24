<?php

namespace App\Controller;

use App\Entity\Ryhmat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class TaskController extends AbstractController
{
    /**
     * @Route("/task", name="task")
     */
    public function index()
    {
        $ryhmat = new Ryhmat();
        $ryhmat->setNimi("Admin");

        $form=$this->createFormBuilder($ryhmat)
            ->add('tunnus', TextType::class)
            ->add('nimi', TextType::class)
            ->add('save', SubmitType::class, 
                [
                    'label' => 'Luo ryhmä'
                ])
            ->getForm();

        return $this->render('task/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
