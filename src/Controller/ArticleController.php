<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
use Symfony\Component\Routing\Annotation\Route;
// Lisätty 
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

// Tietokantaa varten
use App\Entity\Article;

// Lomakkeita varten
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article_list")
     * @Method({"GET"})
     */
    public function index()
    {
        // Muutama artikkeli testiä varten
        //$articles=['Artikkeli 1', 'Artikkeli 2'];

        // talletetaan kaikki tietokannassa olevat artikkelit taulukkoon $articles
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        

        // Lähetetään kaikki artikkelit index-sivulle (näkymä)
        return $this->render('article/index.html.twig',array
        ('articles' => $articles));
    }

    /**
     * @Route("/article/new", name="new_article")
     * Method({GET}, "POST")
     */
    // Luodaan lomakkeen komponentit ja lähetetään ne new-sivulle
    public function new(Request $request){
        $article = new Article();

        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('body', TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
        ->add('save', SubmitType::class, array('label' => 'Create', 'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        // Käsitellään painike
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Talletetaan (persist) tiedot tietokantaan
            
            $article = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            // Ohjaa takaisin. Takaisin ohjauksessa käytetään routen nimeä
            return $this->redirectToRoute('article_list');  // Routen nimi (ArticleController)

        }

        return $this->render('article/new.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/article/edit{id}", name="edit_article")
     * Method({GET}, "POST"})
     */
    // Luodaan lomakkeen komponentit ja lähetetään ne new-sivulle
    public function edit(Request $request, $id){
        $article = new Article();
        // Haetaan tietokannasta yksittäinen artikkeli
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        $form = $this->createFormBuilder($article)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('body', TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
        ->add('save', SubmitType::class, array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary mt-3')))
        ->getForm();

        // Käsitellään painike
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                        
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            // Ohjaa takaisin
            return $this->redirectToRoute('article_list');  // Routen nimi (ArticleController)

        }

        return $this->render('article/edit.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function show($id){
        // Haetaan tietokannasta yksittäinen artikkeli
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        // Lähetään artikkeli show-sivulle (näkymä)
        return $this->render('article/show.html.twig', array
        ('article'=> $article));
    }

    /**
     * @Route("/article/delete/{id}")
     * @Method({"DELETE"})
     */
    public function delete(Request $request, $id){
        // Haetaan poistoa varten tietokannasta yksittäinen artikkeli
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        // Poistotoiminto (remove)
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();

        // Odotetaan vastaus, että kaikki on OK ja lähetetään se takaisin fetch-metodille
        //$response = new Response();
        //$response->send();
        //return $response;
        return(new Response);

        
    }
    

    // /**
    //  * @Route("/article/save")
    //  */
    // // Testi
    // public function save(){
    //     // Tietokannan käsittelyä varten
    //     $entityManager = $this->getDoctrine()->getManager();

    //     // Luodaan artikkeli
    //     $article = new Article();
    //     $article->setTitle('Artikkeli 2');
    //     $article->setBody('Tämä on artikkelin 2 runko');

    //     // Talletetaan tietokantaan
    //     $entityManager->persist($article);
    //     $entityManager->flush();

    //     // Informoidaan kutsujaa
    //     return new Response('Talennetaan artikkeli, jonka ID = '.$article->getId());
    // }
}
