<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GeminiiController extends AbstractController
{
    /**
     * @Route("/geminii", name="geminii")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();
        return $this->render('geminii/index.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);
    }
}
