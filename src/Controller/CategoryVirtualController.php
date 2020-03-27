<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Entity\CategoryVirtual;
use App\Form\CategoryVirtualType;
use App\Repository\CategoryVirtualRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/category/virtual")
 */
class CategoryVirtualController extends AbstractController
{
    /**
     * @Route("/", name="category_virtual_index", methods={"GET"})
     */
    public function index(Request $request, CategoryVirtualRepository $categoryVirtualRepository): Response
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
        return $this->render('category_virtual/index.html.twig', [
            'category_virtuals' => $categoryVirtualRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="category_virtual_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
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

        $categoryVirtual = new CategoryVirtual();
        $form2 = $this->createForm(CategoryVirtualType::class, $categoryVirtual);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryVirtual);
            $entityManager->flush();

            return $this->redirectToRoute('category_virtual_index');
        }

        return $this->render('category_virtual/new.html.twig', [
            'category_virtual' => $categoryVirtual,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_virtual_show", methods={"GET"})
     */
    public function show(Request $request, CategoryVirtual $categoryVirtual): Response
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

        return $this->render('category_virtual/show.html.twig', [
            'category_virtual' => $categoryVirtual,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_virtual_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryVirtual $categoryVirtual): Response
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

        $form2 = $this->createForm(CategoryVirtualType::class, $categoryVirtual);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_virtual_index');
        }

        return $this->render('category_virtual/edit.html.twig', [
            'category_virtual' => $categoryVirtual,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_virtual_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryVirtual $categoryVirtual): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryVirtual->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryVirtual);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_virtual_index');
    }
}
