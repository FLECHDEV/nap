<?php

namespace App\Controller;

use App\Entity\Dialogue;
use App\Form\AjoutDialogueType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DialogueController extends AbstractController
{
    /**
     * @Route("/dialogue", name="dialogue")
     */
    public function DialogueAction(Request $request)
    {
    
        // ici je récupére tous les dialogues
        $dialogues = $this->getDoctrine()->getRepository(Dialogue::class)->findAll();    
        $message = new Dialogue();
        $form = $this->createForm(AjoutDialogueType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setUser($this->getUser);
            $message->setCreatedAt(new \DateTime('now'));
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($message);
            $doctrine->flush();
        }
        return $this->render('dialogue/index.html.twig', [
            //et là je les envois au template
            'dialogues' => $dialogues,
            'messageForm' => $form->createView()
        ]);

    }
}
