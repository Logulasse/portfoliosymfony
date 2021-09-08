<?php

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();

        if(!$menus)
        {
            throw $this->createNotFoundException('Erreur ! Aucun menu trouvé dans la base de données !');
        }

        return $this->render('contact/index.html.twig', [
            'menus' => $menus,
            'controller_name' => 'ContactController',
        ]);
    }
}
