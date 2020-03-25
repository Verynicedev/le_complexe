<?php

namespace App\Controller;

use App\Entity\Virtual;
use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Entity\CategoryVirtual;
use App\Repository\VirtualRepository;
use App\Repository\CategoryVirtualRepository;
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

     /**
     * @Route("/realitevirtuelle/category", name="allcategoryVR")
     */
    public function showAllCategoryVirtual(VirtualRepository $repository, Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm( ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact,
            ]);

        }
        return $this->render('realitevirtuelle/vueAllCategoryVirtual.html.twig', [
            'form' => $form->createView(),
            'jeux' => $repository->findBy([],['id'=>'DESC'])

        ]);
    }

    /**
     * @Route("/realitevirtuelle/category/{id<\d+>}", name="categoryVR")
     */
    public function showCategoryVirtual(CategoryVirtual $category, VirtualRepository $repository, Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm( ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact,
            ]);

        }
        return $this->render('realitevirtuelle/vueCategoryVirtual.html.twig', [
            'form' => $form->createView(),
            'category' => $category,
            'jeux' => $repository->findAllWithJoinByCategory($category)

        ]);
    }

     /**
     * @Route("/realitevirtuelle/category/virtual/{id<\d+>}", name="jeuVR")
     */
    public function showVirtual(Virtual $virtual, VirtualRepository $repository, Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm( ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact,
            ]);

        }
        return $this->render('realitevirtuelle/vueVirtual.html.twig', [
            'form' => $form->createView(),
            'jeu' => $virtual

        ]);
    }
}
