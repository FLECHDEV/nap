<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GeminiiController extends AbstractController
{
    /**
     * @Route("/geminii", name="geminii")
     */
    public function index()
    {
        return $this->render('geminii/index.html.twig', [
            'controller_name' => 'GeminiiController',
        ]);
    }
}
