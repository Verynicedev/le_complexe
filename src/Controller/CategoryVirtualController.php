<?php

namespace App\Controller;

use App\Entity\CategoryVirtual;
use App\Form\CategoryVirtualType;
use App\Repository\CategoryVirtualRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/virtual")
 */
class CategoryVirtualController extends AbstractController
{
    /**
     * @Route("/", name="category_virtual_index", methods={"GET"})
     */
    public function index(CategoryVirtualRepository $categoryVirtualRepository): Response
    {
        return $this->render('category_virtual/index.html.twig', [
            'category_virtuals' => $categoryVirtualRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_virtual_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoryVirtual = new CategoryVirtual();
        $form = $this->createForm(CategoryVirtualType::class, $categoryVirtual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryVirtual);
            $entityManager->flush();

            return $this->redirectToRoute('category_virtual_index');
        }

        return $this->render('category_virtual/new.html.twig', [
            'category_virtual' => $categoryVirtual,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_virtual_show", methods={"GET"})
     */
    public function show(CategoryVirtual $categoryVirtual): Response
    {
        return $this->render('category_virtual/show.html.twig', [
            'category_virtual' => $categoryVirtual,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_virtual_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryVirtual $categoryVirtual): Response
    {
        $form = $this->createForm(CategoryVirtualType::class, $categoryVirtual);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_virtual_index');
        }

        return $this->render('category_virtual/edit.html.twig', [
            'category_virtual' => $categoryVirtual,
            'form' => $form->createView(),
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
