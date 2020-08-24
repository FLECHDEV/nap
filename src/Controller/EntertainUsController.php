<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntertainUsController extends AbstractController
{
    /**
     * @Route("/entertain/us", name="entertainus")
     */
    public function index()
    {
        return $this->render('entertain_us/index.html.twig', [
            'controller_name' => 'EntertainUsController',
        ]);
    }
}
