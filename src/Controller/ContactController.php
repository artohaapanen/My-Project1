<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {
    	$form = $this->createForm(ContactType::class);

    	$form->handleRequest($request);

    	// Onko painettu painiketta ja onko tiedot valideja?
    	if ($form->isSubmitted() && $form->isValid()) {

    		// Kyllä, joten haetaan data muuttujaan
    		$contactFormData = $form->getData();
    		
    		// Näyttää lomakkeelle syötetyt tiedot
    		dump($contactFormData);

    		// Tee jotakin mielenkiintoista (esim. lähetä email, tallenna tietokantaan)
    	}

    	return $this->render('contact/contact.html.twig', [
    		'our_form' => $form->createView(),
    	]);

    }
}
