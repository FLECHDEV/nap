<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Form\AjouterConcertType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concerts", name="concert", methods={"GET","POST"})
     */
    public function index(Request $request): Response
    {

        $concerts = $this->getDoctrine()->getRepository(Concert::class)->findAll();    
        $concert = new Concert();
        $form = $this->createForm(AjouterConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($concert);
            $doctrine->flush();

            // appeler fonction mail 

            return $this->redirectToRoute('concerts');
        }
        return $this->render('concert/index.html.twig', [
            'concerts' => $concerts,
            'concertsForm' => $form->createView()
        ]);
    }
}
        // return $this->render('concert/index.html.twig', [
        //     'concert' => $concertRepository->findAll(),