<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(Request $request)
    {
        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('portfolio/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);
        }

        return $this->render('portfolio/homepage.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/restaurant", name="restaurant")
     */
    public function restaurant(Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('portfolio/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);
        }

        return $this->render('restaurant/restaurant.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/lasergame", name="lasergame")
     */
    public function lasergame(Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('portfolio/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);

        }
        return $this->render('lasergame/lasergame.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/realitevirtuelle", name="realitevirtuelle")
     */
    public function realitevirtuelle(Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('portfolio/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);

        }
        return $this->render('realitevirtuelle/realitevirtuelle.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
