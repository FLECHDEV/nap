<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DialogueController extends AbstractController
{
    /**
     * @Route("/dialogue", name="dialogue")
     */
    public function index()
    {
        return $this->render('dialogue/index.html.twig', [
            'controller_name' => 'DialogueController',
        ]);
    }
}
