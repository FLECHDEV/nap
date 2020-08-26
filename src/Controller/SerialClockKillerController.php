<?php

namespace App\Controller;

use App\Entity\Groupe;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SerialClockKillerController extends AbstractController
{
    /**
     * @Route("/serial/clock/killer", name="serialclockkiller")
     */
    public function index()
    {
        $listeGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();
        return $this->render('serial_clock_killer/index.html.twig', [
            'listeGroupe' => $listeGroupes
        ]);
    }
}
