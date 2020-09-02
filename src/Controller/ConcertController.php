<?php

namespace App\Controller;

use Exception;
use App\Entity\Concert;
use App\Entity\Groupe;
use App\Entity\Subscriber;
use App\Form\SubscriberType;
use App\Form\AjouterConcertType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConcertController extends AbstractController
{
    /**
     * @Route("/concerts", name="concerts")
     */
    public function index(Request $request, MailerInterface $mailer)
    {
        // Création de la newsletter et de son formulaire
        $sub = new Subscriber();
        $subscriberForm = $this->createForm(SubscriberType::class, $sub);
        $subscriberForm->handleRequest($request);

        //Création du concert et de son formulaire
        $concert = new Concert();
        $concertForm = $this->createForm(AjouterConcertType::class, $concert);
        $concertForm->handleRequest($request);


        // Soumission du formulaire de concert. 
        if ($concertForm->isSubmitted() && $concertForm->isValid()) {
            if ($concert->getDate() > date('now')) {
                $this->addFlash('error', 'La date est depassée');
                return $this->redirectToRoute('concerts');
            }

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($concert);
            $doctrine->flush();

            // appeler fonction mail
            $email = (new TemplatedEmail())
                ->From('normandprod14@gmail.com')
                ->to('franckypage6@hotmail.com')
                ->subject('Newsletter Norm"And.Prod')
                ->htmlTemplate('subscriber/subscribe.html.twig');

            $listeSubscribers = $this->getDoctrine()->getRepository(Subscriber::class)->findAll();
            foreach ($listeSubscribers as $subscriber) {
                $email->cc($subscriber->getMail());
                $mailer->send($email);
            }
            return $this->redirectToRoute('concerts');
        }

        // Soumission du formulaire de newsletter
        if ($subscriberForm->isSubmitted() && $subscriberForm->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($sub);
            $doctrine->flush();

            $this->addFlash('message', 'Vous êtes inscrit à la newsletter !');
            return $this->redirectToRoute('concerts');
        }

        $concerts = $this->getDoctrine()->getRepository(Concert::class)->findAll();

        return $this->render('concert/index.html.twig', [
            'concerts' => $concerts,
            'concertsForm' => $concertForm->createView(),
            'subscriberForm'  => $subscriberForm->createView()
        ]);
    }
}
