<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Menu;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();

        if(!$menus)
        {
            throw $this->createNotFoundException('Erreur ! Aucun menu trouvé dans la base de données !');
        }

        return $this->render('home/index.html.twig', [
            'menus' => $menus,
            'controller_name' => 'HomeController',
        ]);
    }
}
