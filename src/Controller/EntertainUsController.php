<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntertainUsController extends AbstractController
{
    /**
     * @Route("/entertain/us", name="entertainus")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();
        
        return $this->render('entertainus/index.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);
    }
}
