<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\PageRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComplexeController extends AbstractController
{
    /**
     * @Route("/{slug}", name="complexe", defaults={"slug":"complexe"}, requirements={"slug": "complexe|restaurant|laser-game|realite-virtuelle"})
     */
    public function index(Page $page)
    {
        
        return $this->render('complexe/index.html.twig', [
            'page' => $page,
        ]);
    }

}
