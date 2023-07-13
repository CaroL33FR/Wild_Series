<?php

// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;
use App\Repository\EpisodeRepository;
use App\Repository\SeasonRepository;
use App\Repository\ProgramRepository;
use Symfony\Component\HttpFoundation\RequestStack;
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

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('warning', 'La série n\'a pu être ajoutée. Vérifiez vos champs.');
            /*return $this->redirectToRoute('program_new');*/
        } elseif ($form->isSubmitted() && $form->isValid()) {
            $programRepository->save($program, true);
            $this->addFlash('success', 'La série a bien été ajoutée');
        }

        /*
        if ($form->isSubmitted() && $form->isValid()) {
            $programRepository->save($program, true);

            $this->addFlash('success', 'La série a bien été ajoutée');
            /*$this->addFlash('warning', 'La série n\'a pu être ajoutée');*/
            /*return $this->redirectToRoute('program_index');*/

        return $this->render('program/new.html.twig', [
            'program' => $program,
            'form' => $form,
        ]);

    }

    #[Route('/{id}', name: 'id', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function show(Program $program, ProgramRepository $programRepository): Response
    {
        /* PARAM CONVERTER: line below not to be added, used when param converter not used
        and $id is used as parameter in method show
         * $program = $programRepository->findOneBy(['id' => $id]);
*/
        if (!$program) {
            throw $this->createNotFoundException(
            );
        }
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/{program}/season/{season}', name: 'program_season_show', methods: ['GET'])]
    public function showSeason(Program $program, ProgramRepository $programRepository, Season $season, SeasonRepository $seasonRepository): Response
    {
       /* NOT USED as param converter used
        $program = $programRepository->findOneBy(['id' => $programId]);
        $season = $seasonRepository->find($seasonId);
        */
        if (!$program || !$season) {
            throw $this->createNotFoundException(
            );
        }

        return $this->render('program/season_show.html', [
            'program' => $program,
            'season' => $season,
        ]);
    }

    #[Route('/{program}/season/{season}/episode/{episode}', name: 'program_episode_show', methods: ['GET'])]
    public function showEpisode(Program $program, ProgramRepository $programRepository, Season $season, SeasonRepository $seasonRepository, Episode $episode, EpisodeRepository $episodeRepository): Response
    {
        /* NOT USED as param converter used
         $program = $programRepository->findOneBy(['id' => $programId]);
         $season = $seasonRepository->find($seasonId);
         */
        if (!$program || !$season) {
            throw $this->createNotFoundException(
            );
        }

        return $this->render('/program/episode_show.html', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode,


        ]);
    }
}