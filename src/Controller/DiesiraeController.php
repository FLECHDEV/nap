<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DiesiraeController extends AbstractController
{
    /**
     * @Route("/diesirae", name="diesirae")
     */
    public function index()
    {
        return $this->render('pages/diesirae.html.twig', [
            'controller_name' => 'DiesiraeController',
        ]);
    }
}
