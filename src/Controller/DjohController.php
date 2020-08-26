<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DjohController extends AbstractController
{
    /**
     * @Route("/djoh", name="djoh")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();
        return $this->render('djoh/index.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);
    }
}
