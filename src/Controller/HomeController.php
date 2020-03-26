<?php

namespace App\Controller;

use App\Entity\Virtual;
use App\Entity\ContactForm;
use App\Entity\CategoryMenu;
use App\Entity\CategoryTarif;
use App\Form\ContactFormType;

use App\Entity\CategoryVirtual;
use App\Repository\MenuRepository;
use App\Repository\TarifRepository;
use App\Repository\VirtualRepository;
use App\Repository\CategoryMenuRepository;
use App\Repository\CategoryTarifRepository;
use App\Repository\CategoryVirtualRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="homepage1")
     */
    public function home(Request $request)
    {
        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);
        }

        return $this->render('home/homepage.html.twig', [
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
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);
        }

        return $this->render('restaurant/restaurant.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/restaurant/category", name="allcategoryMenu")
     */
    public function showAllCategoryMenu(CategoryMenuRepository $repository, Request $request)
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
        return $this->render('restaurant/vueAllCategoryMenu.html.twig', [
            'form' => $form->createView(),
            'categories' => $repository->findBy([],['id'=>'DESC'])

        ]);
    }
     /**
     * @Route("/restaurant/category/{id<\d+>}", name="categoryMenu")
     */
    public function showCategoryMenu(CategoryMenu $category,MenuRepository $repository, Request $request)
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
        return $this->render('restaurant/vueCategoryMenu.html.twig', [
            'form' => $form->createView(),
            'category' => $category,
            'menus' => $repository->findAllWithJoinByCategory($category)

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
            return $this->render('home/vue.html.twig',  [
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
    public function showAllCategoryVirtual(CategoryVirtualRepository $repository, Request $request)
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
            'categories' => $repository->findBy([],['id'=>'DESC'])

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
    
    /**
     * @Route("/lasergame", name="lasergame")
     */
    public function lasergame(Request $request)
    {

        $contact = new ContactForm;
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('home/vue.html.twig',  [
                'form' => $form->createView(),
                'contact' => $contact
            ]);

        }
        return $this->render('lasergame/lasergame.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/lasergame/category", name="allcategorytarif")
     */
    public function showAllCategoryTarif(CategoryTarifRepository $repository, Request $request)
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
        return $this->render('lasergame/vueAllCategoryTarif.html.twig', [
            'form' => $form->createView(),
            'categories' => $repository->findBy([],['id'=>'ASC'])

        ]);
    }

        /**
     * @Route("/lasergame/category/{id<\d+>}", name="categorytarif")
     */
    public function showCategoryTarif(CategoryTarif $category, TarifRepository $repository, Request $request)
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
        return $this->render('lasergame/vueCategoryTarif.html.twig', [
            'form' => $form->createView(),
            'category' => $category,
            'tarifs' => $repository->findAllWithJoinByCategory($category)

        ]);
    }
    
}
