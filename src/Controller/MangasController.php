<?php

namespace App\Controller;

use App\Entity\Mangas;
use App\Entity\Comments;
use App\Entity\User;
use App\Form\CommentsType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MangasController extends AbstractController
{
    /**
     * @Route("/manga/{id}", name="mangas")
     */
    public function show(int $id, Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Mangas::class);
        $manga = $repository->find($id);
        $user = $this->getDoctrine()->getRepository(User::class);

        $comments = new Comments;
        $commentForm = $this->createForm(CommentsType::class, $comments);
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$comments` variable has also been updated
            $comments = $commentForm->getData();
            $comments->setDate(new DateTime());
            $comments->setMangasID($manga);
            $comments->setUserID($user->find($id));
            // ... perform some action, such as saving the comments to the database
            // for example, if comments is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comments);
            $entityManager->flush();

            return $this->redirectToRoute('mangas', ['id' => $manga->getId()]);
            }   

        $comments = $manga->getComments();
        return $this->render('mangas/index.html.twig', [
            'manga' => $manga,
            'comments' => $comments,
            'commentForm' => $commentForm->createView()
        ]);
    }
}
