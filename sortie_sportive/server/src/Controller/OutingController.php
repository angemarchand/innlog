<?php

namespace App\Controller;

use App\Entity\Outing;
use App\Form\OutingType;
use App\Repository\OutingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/outing")
 */
class OutingController extends AbstractController
{
    /**
     * @Route("/", name="outing_index", methods={"GET"})
     */
    public function index(OutingRepository $outingRepository): Response
    {
        return $this->render('outing/index.html.twig', [
            'outings' => $outingRepository->findAll(),
        ]);
    }

    /**
     * @Route("/create", name="outing_create", methods="POST")
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $postOuting = $request->getContent();
        // dd($postOuting);
        $postOuting = json_decode($postOuting, true);
        
       $outing = new Outing();
       $outing->setType($postOuting["type"]);
       $outing->setStartAt($postOuting["start_date"]);
       $outing->setLastAt($postOuting["end_date"]);
       $outing->setStartTime($postOuting["start_time"]);
       $outing->setEndTime($postOuting["end_time"]);
       $outing->setDistance($postOuting["distance"]);
       $outing->setComment($postOuting["comment"]);
       $outing->setUser($postOuting["id"]);
    //    dd($outing);

       $em->persist($outing);

       $em->flush();

       

        return $this->json(["code"=>200, 'user'=>$outing , 200]);

 
    }

    /**
     * @Route("/{id}", name="outing_show", methods={"GET"})
     */
    // public function show(Outing $outing): Response
    // {
    //     return $this->render('outing/show.html.twig', [
    //         'outing' => $outing,
    //     ]);
    // }

    /**
     * @Route("/{id}/edit", name="outing_edit", methods={"GET","POST"})
     */
    // public function edit(Request $request, Outing $outing): Response
    // {
    //     $form = $this->createForm(OutingType::class, $outing);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('outing_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->renderForm('outing/edit.html.twig', [
    //         'outing' => $outing,
    //         'form' => $form,
    //     ]);
    // }

    /**
     * @Route("/{id}", name="outing_delete", methods={"POST"})
     */
    // public function delete(Request $request, Outing $outing): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$outing->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($outing);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('outing_index', [], Response::HTTP_SEE_OTHER);
    // }
}
