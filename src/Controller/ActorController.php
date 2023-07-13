<?php

namespace App\Controller;

use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actor', name: 'actor_')]
class ActorController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ActorRepository $actorRepository): Response
    {
        $actors = $actorRepository->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors,
        ]);
    }

    #[Route('/{id}', name: 'id', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show($id, ActorRepository $actorRepository): Response
    {
        $actor = $actorRepository->findOneBy(['id' => $id]);

        if (!$actor) {
            throw $this->createNotFoundException(
                'No category with such a name as '.$id.' was found in category\'s table.'
            );

        }

        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
        ]);
    }
}
