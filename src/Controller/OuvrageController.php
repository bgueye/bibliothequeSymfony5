<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
USE App\Entity\Theme;
use App\Entity\Editeur;

class OuvrageController extends AbstractController
{
    /**
     * @Route("/", name="ouvrage.index")
     */
    public function index(): Response
    {
        $theme = new Theme();
        $theme->setNomTheme('Sociologie');

        $em = $this->getDoctrine()->getManager();
        $em->persist($theme);
        $em->flush();

        return $this->render('ouvrage/index.html.twig', [
            'controller_name' => 'OuvrageController',
        ]);
    }
}
