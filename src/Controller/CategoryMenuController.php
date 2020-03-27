<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Entity\CategoryMenu;
use App\Form\ContactFormType;
use App\Form\CategoryMenuType;
use App\Repository\CategoryMenuRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/category/menu")
 */
class CategoryMenuController extends AbstractController
{
    /**
     * @Route("/", name="category_menu_index", methods={"GET"})
     */
    public function index(Request $request, CategoryMenuRepository $categoryMenuRepository): Response
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
        return $this->render('category_menu/index.html.twig', [
            'category_menus' => $categoryMenuRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="category_menu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
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
        $categoryMenu = new CategoryMenu();
        $form2 = $this->createForm(CategoryMenuType::class, $categoryMenu);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryMenu);
            $entityManager->flush();

            return $this->redirectToRoute('category_menu_index');
        }

        return $this->render('category_menu/new.html.twig', [
            'category_menu' => $categoryMenu,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="category_menu_show", methods={"GET"})
     */
    public function show(CategoryMenu $categoryMenu): Response
    {
        return $this->render('category_menu/show.html.twig', [
            'category_menu' => $categoryMenu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_menu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryMenu $categoryMenu): Response
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
        $form2 = $this->createForm(CategoryMenuType::class, $categoryMenu);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_menu_index');
        }

        return $this->render('category_menu/edit.html.twig', [
            'category_menu' => $categoryMenu,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="category_menu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryMenu $categoryMenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryMenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryMenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_menu_index');
    }
}
