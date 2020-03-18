<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComplexeController extends AbstractController
{
    /**
     * @Route("/complexe", name="complexe")
     */
    public function index()
    {
        return $this->render('complexe/index.html.twig', [
            'controller_name' => 'ComplexeController',
        ]);
    }
}
