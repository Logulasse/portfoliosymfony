<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\CVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    private CVRepository $cv;

    public function __construct(CVRepository $cv)
    {
        $this->cv = $cv;
    }

    #[Route('/cv', name: 'cv')]
    public function index(): Response
    {
        $menus = $this->getDoctrine()->getRepository(Menu::class)->findAll();

        if(!$menus)
        {
            throw $this->createNotFoundException('Erreur ! Aucun menu trouvé dans la base de données !');
        }

        $cv = $this->cv->findBy([
            'isActive' => true
        ]);

        return $this->render('cv/index.html.twig', [
            'menus' => $menus,
            'cv_path' => $cv[0]->getPath(),
            'controller_name' => 'CVController',
        ]);
    }
}
