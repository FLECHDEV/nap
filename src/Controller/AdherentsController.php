<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdherentsController extends AbstractController
{
    /**
     * @Route("/adherents", name="adherents")
     */
    public function index()
    {
        return $this->render('adherents/index.html.twig', [
            'controller_name' => 'AdherentsController',
        ]);
    }
}
