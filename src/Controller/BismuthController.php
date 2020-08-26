<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BismuthController extends AbstractController
{
    /**
     * @Route("/bismuth", name="bismuth")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();
        return $this->render('bismuth/index.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);
    }
}
