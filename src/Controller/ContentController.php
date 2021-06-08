<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController extends AbstractController
{
    /**
     * @Route("/content", name="content")
     */
    public function index(): Response
    {
        return $this->render('content/new.html.twig', [
            'controller_name' => 'ContentController',
        ]);
    }
}
