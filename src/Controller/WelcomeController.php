<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return new Response('<h1>Tervetuloa kurssille</h1>');
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome(){
    	return $this->render('welcome/index.html.twig');
    }


    /**
     * @Route(
     *	"/hello-page/{name}", 
     *	name="hello_page", 
     *	defaults={"name" = "Oletusnimi"},
     *	requirements={"name" = "[A-Za-z]+"} 
     *	)
     */
    //public function hello(Request $request, $name='Arto'){
    public function hello($name='Arto'){
    	return $this->render('hello_page.html.twig', [
    		'some_variable' => 'mitä vain haluat',
    		'isAttack' => true,
    		'name' => $name, //$request->query->get('name', 'Oletusnimi'), //"Arto",

    	]);
    }


    /**
     * @Route("/custom", name="custom")
     */
    public function custom(){
    	return new Response('<h1>Custom-sivu</h1>');
    }

    /**
     * @Route("/custom2/{name?}", name="custom2")
     * @param Request $request
     * @return Response
     */
    public function custom2(Request $request){
        $name = dump($request->get('name'));
    	return new Response('<h1>Custom-sivu '.$name.' </h1>');
    }
}
