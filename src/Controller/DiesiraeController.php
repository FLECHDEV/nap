<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DiesiraeController extends AbstractController
{
    /**
     * @Route("/diesirae", name="diesirae")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();

        return $this->render('pages/diesirae.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);

    }
}
