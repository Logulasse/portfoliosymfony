<?php

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    #[Route('/cv', name: 'cv')]
    public function index(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();

        if(!$menus)
        {
            throw $this->createNotFoundException('Erreur ! Aucun menu trouvé dans la base de données !');
        }

        return $this->render('cv/index.html.twig', [
            'menus' => $menus,
            'controller_name' => 'CVController',
        ]);
    }
}
