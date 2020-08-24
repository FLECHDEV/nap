<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BismuthController extends AbstractController
{
    /**
     * @Route("/bismuth", name="bismuth")
     */
    public function index()
    {
        return $this->render('bismuth/index.html.twig', [
            'controller_name' => 'BismuthController',
        ]);
    }
}
