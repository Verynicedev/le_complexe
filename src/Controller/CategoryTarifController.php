<?php

namespace App\Controller;

use App\Entity\ContactForm;
use App\Entity\CategoryTarif;
use App\Form\ContactFormType;
use App\Form\CategoryTarifType;
use App\Repository\CategoryTarifRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/category/tarif")
 */
class CategoryTarifController extends AbstractController
{
    /**
     * @Route("/", name="category_tarif_index", methods={"GET"})
     */
    public function index(Request $request,CategoryTarifRepository $categoryTarifRepository): Response
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
        return $this->render('category_tarif/index.html.twig', [
            'category_tarifs' => $categoryTarifRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="category_tarif_new", methods={"GET","POST"})
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

        $categoryTarif = new CategoryTarif();
        $form2 = $this->createForm(CategoryTarifType::class, $categoryTarif);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryTarif);
            $entityManager->flush();

            return $this->redirectToRoute('category_tarif_index');
        }

        return $this->render('category_tarif/new.html.twig', [
            'category_tarif' => $categoryTarif,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="category_tarif_show", methods={"GET"})
     */
    public function show(CategoryTarif $categoryTarif): Response
    {
        return $this->render('category_tarif/show.html.twig', [
            'category_tarif' => $categoryTarif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_tarif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CategoryTarif $categoryTarif): Response
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

        $form2 = $this->createForm(CategoryTarifType::class, $categoryTarif);
        $form2->handleRequest($request);

        if ($form3->isSubmitted() && $form3->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_tarif_index');
        }

        return $this->render('category_tarif/edit.html.twig', [
            'category_tarif' => $categoryTarif,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="category_tarif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryTarif $categoryTarif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryTarif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryTarif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_tarif_index');
    }
}
