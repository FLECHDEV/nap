<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SerialClockKillerController extends AbstractController
{
    /**
     * @Route("/serial/clock/killer", name="serialclockkiller")
     */
    public function index()
    {
        return $this->render('serial_clock_killer/index.html.twig', [
            'controller_name' => 'SerialClockKillerController',
        ]);
    }
}
