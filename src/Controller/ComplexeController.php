<?php

namespace App\Controller;

use App\Repository\PageRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComplexeController extends AbstractController
{
    /**
     * @Route("/", name="complexe")
     */
    public function index(PageRepository $repo)
    {
        $page= $repo->find(7);
        return $this->render('complexe/index.html.twig', [
            'page' => $page,
        ]);
    }
}
