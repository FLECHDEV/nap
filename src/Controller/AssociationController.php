<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssociationController extends AbstractController
{ 
    /**
     * @Route("/association", name="association")
     */

    public function association(): Response
    {
        return $this->render('association/association.html.twig');
    }
}