<?php

namespace App\Controller;

use App\Repository\ProgramRepository;
/*use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;*/
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CategoryRepository;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        /* Method 'findAll' to retrieve all categories listed in database */
        $categories = $categoryRepository->findAll();
        return $this->render('/category/index.html.twig', [
            'categories' => $categories,
            ]);
    }

    #[Route('/{categoryName}', name: 'show')]
    public function show($categoryName, CategoryRepository $categoryRepository, ProgramRepository $programRepository): Response
    {
          $category = $categoryRepository->findOneBy(['name' => $categoryName]);

          /*
         if (!$category) {
             try {
                 throw $this->createNotFoundException(
                     'No category with the following name '.$categoryName.' was found in the category table.');

             }catch (NotFoundHttpException $e){
                 return $this->render('error/error.html.twig', [
                     'error' => $e,
                     ]);
             }
        }
        */

        if (!$category) {
            throw $this->createNotFoundException(
                'No category with such a name as '.$categoryName.' was found in category\'s table.'
            );

        }

        /* ******************  */
         $programs = $programRepository->findby(['category' => $category->getId()],['id' => 'DESC'], 3);

         return $this->render('category/show.html.twig', [
             'categories' => $category,
             'programs' => $programs,
        ]);

      }


}