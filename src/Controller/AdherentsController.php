<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Entity\Dialogue;
use App\Form\UploadType;
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

        // upload de fichier pdf

        $upload = new Upload();
        $Uploadform = $this->createForm(UploadType::class, $upload);

        $Uploadform->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $upload->getName();
            $fileName = md5(uniqid()) .'.'. $file->guessExtension();
            $file->move($this->getParameter('upload_pdf'), $fileName);
            $upload->setName($fileName);
            
            return $this->redirectToRoute('adherents');
        }        

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
            'messageForm' => $form->createView(),
            'uploadForm'=> $Uploadform->createView()
        ]);
    }
}
