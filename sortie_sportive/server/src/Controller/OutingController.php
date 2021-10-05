<?php

namespace App\Controller;

use App\Entity\Outing;
use App\Entity\User;
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
        $outing = $this->getDoctrine()
            ->getRepository(Outing::class);
        $outing = $outing->findAll();
        // dd($outing);

        return $this->json(["code"=>200, 'user'=>$outing , 200]);
        
    }

    /**
     * @Route("/create", name="outing_create", methods="POST")
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $postOuting = $request->getContent();
        $postOuting = json_decode($postOuting, true);
        $user = new User();
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($postOuting["user_id"]);    // relates this outing to the user

        $outing = new Outing();
        $outing->setType($postOuting["type"]);
        $outing->setStartAt($postOuting["start_date"]);
        $outing->setLastAt($postOuting["end_date"]);
        $outing->setStartTime($postOuting["start_time"]);
        $outing->setEndTime($postOuting["end_time"]);
        $outing->setDistance($postOuting["distance"]);
        $outing->setComment($postOuting["comment"]);
        $outing->setUserId($user);
  
        // dd($outing);

        $em->persist($outing);

        $em->flush();

       

        return $this->json(["code"=>200, 'outing'=>$outing , 200]);

 
    }

    // /**
    //  * @Route("/{id}", name="outing_show", methods={"GET"})
    //  */
    // public function show($id): Response
    // {
    //     $outing = $this->getDoctrine()
    //         ->getRepository(Outing::class)
    //         ->find($id);

    //     $user = $outing->getUserId();
    //     dd($user);

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
