<?php

namespace App\Controller;

use App\Entity\Bands;
use App\Form\AjouterConcertType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BandsController extends AbstractController
{
    /**
     * @Route("/concerts", name="bands", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {

        $concerts = $this->getDoctrine()->getRepository(Bands::class)->findAll();    
        $concert = new Bands();
        $form = $this->createForm(AjouterConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $concert->setNom($this->getNom);
            $concert->setConcerts($this->getConcerts);
            $concert->setDate(new \DateTime);
            $concert->setHeure(new \DateTime);
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($concert);
            $doctrine->flush();
        }
        return $this->render('bands/index.html.twig', [
            'bands' => $concerts,
            'concertsForm' => $form->createView()
        ]);
    }
}
        // return $this->render('bands/index.html.twig', [
        //     'bands' => $bandsRepository->findAll(),