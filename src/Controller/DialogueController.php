<?php

namespace App\Controller;

use App\Entity\Dialogue;
use App\Form\DialogueType;
use App\Repository\DialogueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DialogueController extends AbstractController
{
    /**
     * @Route("/dialogue", name="dialogue")
     */
    public function index(DialogueRepository $dialogueRepository): Response
    {
        return $this->render('dialogue/index.html.twig', [
            'dialogues' => $dialogueRepository->findAll(),
        ]);
    }

    public function newMessage()
    {
        $message = new Dialogue();
        $form = $this->createForm(DialogueType::class, $message);

        return $this->render('dialogue/index.html.twig', [
            'dialogueForm' => $form->createView()
        ]);

    }
}
