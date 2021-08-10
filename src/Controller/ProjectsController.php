<?php

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'projects')]
    public function index(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();

        if(!$menus)
        {
            throw $this->createNotFoundException('Erreur ! Aucun menu trouvé dans la base de données !');
        }

        return $this->render('projects/index.html.twig', [
            'menus' => $menus,
            'controller_name' => 'ProjectsController',
        ]);
    }
}
