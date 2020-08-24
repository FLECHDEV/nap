<?php

namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubscriberController extends AbstractController
{
    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function index(Request $request)
    {
        $Subscriber = new Subscriber();
        $form = $this->createForm(SubscriberType::class, $Subscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($Subscriber);
            $doctrine->flush();

            $this->addFlash('message', 'Vous êtes inscrit à la newsletter !');
            return $this->redirectToRoute('subscriber');
        }
        return $this->render('subscriber/index.html.twig', [
            'subscriberForm'  => $form->createView()
        ]);
    }
}
