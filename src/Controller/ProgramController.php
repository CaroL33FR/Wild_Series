<?php

// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Program;
use App\Form\ProgramType;
use App\Repository\SeasonRepository;
use App\Repository\ProgramRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();

        return $this->render('program/index.html.twig', [
            'programs' => $programs,
            ]
        );
    }
    #[Route('/new', name: 'new')]
    public function new(Request $request, ProgramRepository $programRepository): Response
    {
        $program = new Program();
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $programRepository->save($program, true);
            return $this->redirectToRoute('program_index');
    }
        return $this->render('program/new.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/{id}', name: 'id', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show($id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);

        if (!$program) {
            throw $this->createNotFoundException(
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }

/*
    #[Route('program/{programId}/seasons/{seasonId}', name: 'program_season_show', methods: ['GET'])]
    public function showSeason($programId, $seasonId, ProgramRepository $programRepository, SeasonRepository $seasonRepository): Response
    {
        $program = $programRepository->find($programId);

        $seasons = $seasonRepository->find($seasonId);
        return $this->render('program/season_show.html.twig')[
            'program'=> $program,
            'season'=> $seasons
        ];
    }*/
}