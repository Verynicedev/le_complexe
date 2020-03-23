<?php

namespace App\Controller;

use App\Entity\Tarif;
use App\Form\TarifType;
use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Repository\TarifRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/tarif")
 */
class TarifController extends AbstractController
{
    /**
     * @Route("/", name="tarif_index", methods={"GET"})
     */
    public function index(Request $request, TarifRepository $tarifRepository): Response
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

        return $this->render('tarif/index.html.twig', [
            'tarifs' => $tarifRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="tarif_new", methods={"GET","POST"})
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

        $tarif = new Tarif();
        $form2 = $this->createForm(TarifType::class, $tarif);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tarif);
            $entityManager->flush();

            return $this->redirectToRoute('tarif_index');
        }

        return $this->render('tarif/new.html.twig', [
            'tarif' => $tarif,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_show", methods={"GET"})
     */
    public function show(Tarif $tarif): Response
    {
        return $this->render('tarif/show.html.twig', [
            'tarif' => $tarif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tarif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tarif $tarif): Response
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

        $form2 = $this->createForm(TarifType::class, $tarif);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tarif_index');
        }

        return $this->render('tarif/edit.html.twig', [
            'tarif' => $tarif,
            'form' => $form->createView(),
            'form2' => $form2->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="tarif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tarif $tarif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tarif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tarif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tarif_index');
    }
}
