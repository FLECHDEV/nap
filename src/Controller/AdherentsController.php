<?php

namespace App\Controller;

use App\Entity\Dialogue;
use App\Form\AjoutDialogueType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdherentsController extends AbstractController
{
    /**
     * @Route("/adherents", name="adherents")
     */
    public function index(Request $request)
    {

        
        // ici je récupére tous les dialogues
        $dialogues = $this->getDoctrine()->getRepository(Dialogue::class)->findAll();    
        $message = new Dialogue();
        $form = $this->createForm(AjoutDialogueType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setUser($this->getUser());
            $message->setCreatedAt(new \DateTime('now'));
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($message);
            $doctrine->flush();
            return  $this->redirectToRoute('adherents');
        }
        return $this->render('adherents/index.html.twig', [
            //et là je les envois au template
            'dialogues' => $dialogues,
            'messageForm' => $form->createView()
        ]);
    }
}
