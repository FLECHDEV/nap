<?php

namespace App\Controller;

use App\Entity\Groupe;
use App\Form\GroupeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupeController extends AbstractController
{
    /**
     * @Route("/groupe", name="groupe")
     */
    public function GroupListindex(Request $request)
    {
        $newGroupe = new Groupe();
        $groupeForm = $this->createForm(GroupeType::class, $newGroupe);
        $groupeForm->handleRequest($request);

        if ($groupeForm->isSubmitted()  &&  $groupeForm->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($newGroupe);
            $doctrine->flush();

            $this->addFlash('success', 'Nouveau groupe ajouté !');
            return $this->redirectToRoute('groupe');
        }

        $lesGroupes = $this->getDoctrine()->getRepository(Groupe::class)->findAll();

        return $this->render('groupe/index.html.twig', [
            'groupes' => $lesGroupes,
            'groupeForm' => $groupeForm->createView()
        ]);
    }

    /**
     * @Route("/groupe/{tag}")    
     */
    public function GroupViewIndex(Request $request, string $tag)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $groupe = $entityManager->getRepository(Groupe::class)->findOneBy(['tag' => $tag]);
        return $this->render('groupe/'. $tag .'.html.twig', [
            'groupe' => $groupe
        ]);
    }

    /**
     * @Route("/groupe/{id}/delete", name="delete_groupe")    
     */
    public function DeleteGroupeAction(string $id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $groupe = $entityManager->getRepository(Groupe::class)->find($id);
        $entityManager->remove($groupe);
        $entityManager->flush();
        return  $this->redirectToRoute('groupe');
    }

    /**
     * @Route("/{id}/edit", name="edit_groupe")  
     */
    public function EditGroupeAction(string $id, Request $request, Groupe $groupe): Response
    {
        $editGroupeForm = $this->createForm(GroupeType::class, $groupe);
        $editGroupeForm->handleRequest($request);

        if ($editGroupeForm->isSubmitted() && $editGroupeForm->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $editGroupeForm = $groupe->getNomGroupe($id);
            $groupe->setNomGroupe($id);

            $entityManager->persist($groupe);
            $entityManager->flush();

            return $this->redirectToRoute('groupe');
        }

        return $this->render('groupe/editGroupe.html.twig', [
            'groupe' => $groupe,
            'editGroupeForm' => $editGroupeForm->createView(),
        ]);
    }
}
