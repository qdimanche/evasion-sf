<?php

namespace App\Controller;

use App\Repository\DestinationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/home/{search}", name="home", defaults={"search":""})
     */
    public function index($search = null, DestinationRepository $destinationRepo): Response
    {
        //$manager = $this->getDoctrine()->getManager();
        //$postRepo = $this->getDoctrine()->getRepository(Post::class);
        if (!empty($search)) {
            $items = $destinationRepo->search($search);
        } else {
            $items = $destinationRepo->findAll();
        }
        return $this->render('home/index.html.twig', [
            'items' => $items,
        ]);
    }
}
