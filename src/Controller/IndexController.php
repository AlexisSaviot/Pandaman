<?php

namespace App\Controller;

use App\Entity\Mangas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Mangas::class);
        $mangas = $repository->findAll();
        return $this->render('index.html.twig', [
            'mangas' => $mangas
        ]);
    }
}
