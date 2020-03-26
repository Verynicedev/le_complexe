<?php

namespace App\Controller;

use App\Entity\Virtual;
use App\Form\VirtualType;
use App\Entity\ContactForm;
use App\Form\ContactFormType;
use App\Repository\VirtualRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/virtual")
 */
class VirtualController extends AbstractController
{
    /**
     * @Route("/", name="virtual_index", methods={"GET"})
     */
    public function index(Request $request, VirtualRepository $virtualRepository): Response
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

        return $this->render('virtual/index.html.twig', [
            'virtuals' => $virtualRepository->findAll(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="virtual_new", methods={"GET","POST"})
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
        
        $virtual = new Virtual();
        $form2 = $this->createForm(VirtualType::class, $virtual);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($virtual);
            $entityManager->flush();

            return $this->redirectToRoute('virtual_index');
        }

        return $this->render('virtual/new.html.twig', [
            'virtual' => $virtual,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="virtual_show", methods={"GET"})
     */
    public function show(Request $request, Virtual $virtual): Response
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
        
        return $this->render('virtual/show.html.twig', [
            'virtual' => $virtual,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="virtual_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Virtual $virtual): Response
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
        
        $form2 = $this->createForm(VirtualType::class, $virtual);
        $form2->handleRequest($request);

        if ($form2->isSubmitted() && $form2->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('virtual_index');
        }

        return $this->render('virtual/edit.html.twig', [
            'virtual' => $virtual,
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="virtual_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Virtual $virtual): Response
    {
        if ($this->isCsrfTokenValid('delete'.$virtual->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($virtual);
            $entityManager->flush();
        }

        return $this->redirectToRoute('virtual_index');
    }
}
