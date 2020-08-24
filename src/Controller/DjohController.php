<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DjohController extends AbstractController
{
    /**
     * @Route("/djoh", name="djoh")
     */
    public function index()
    {
        return $this->render('djoh/index.html.twig', [
            'controller_name' => 'DjohController',
        ]);
    }
}
