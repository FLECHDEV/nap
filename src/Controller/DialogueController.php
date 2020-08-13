<?php

namespace App\Controller;

use App\Entity\Dialogue;
use App\Form\AjoutDialogueType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DialogueController extends AbstractController
{

    /**
     * @Route("/dialogue/{id}/delete", name="delete_dialogue")
     * @IsGranted("ROLE_ADMIN")     
    */
    public function DeleteDialogueAction(string $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $dialogue = $entityManager->getRepository(Dialogue::class)->find($id);
        $entityManager->remove($dialogue);
        $entityManager->flush();
        return  $this->redirectToRoute('adherents');
    }
    


}
