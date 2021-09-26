<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
//use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user/register", name="user_register", methods="POST")
     */
    public function register(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $em): Response
    {
        //return "hey";
        $postUser = $request->getContent();
        $postUser = json_decode($postUser, true);

        $user = new User();
        $user->setName($postUser["pseudo"]);
        $user->setEmail($postUser["email"]);
        $password = $hasher->hashPassword($user, $postUser["password"]);
        $user->setPassword($password);

        $em->persist($user);

        $em->flush();
        return $this->json(["code"=>200, 'user'=>$user, 200]);
        //dd($request->request);

    }

    /**
     * @Route("/user/login", name="user_login", methods="POST")
     */
    public function login(Request $request, UserPasswordHasherInterface $hasher, UserRepository $userRepository, EntityManagerInterface $em){
        $loginUser = $request->getContent();
        $loginUser = json_decode($loginUser, true);

        $user = new User();
        $user->setEmail($loginUser["email"]);
        //$password = $hasher->hashPassword($user, $loginUser["password"]);
        //$user->setPassword($password);
        $result = $this->getDoctrine()
            ->getRepository(User::class)
            ->getUser($loginUser["email"]);

        //$pass = $hasher->verify($password, $loginUser["password"]);
        //dd($pass);
        $verif_email = $result[0]->getUsername();
       // $verif_pass = $result[0]->getPassword();
        
        //dd($loginUser["email"]);
        // dd($verif_pass );
        return $this->json(["code"=>200, 'user'=> $result, 200]);

        if($verif_email == $loginUser["email"]){
            //return $this->json(["code"=>200, 'user'=> $verif_email, 200]);
            return new JsonResponse(response);
        }else{
            return new JsonResponse(false);
        }

        
    }
    /**
     * @Route("user/{id}", name="user_show", methods={"GET"})
     */
    public function show($id): Response
    {
        $outing = $this->getDoctrine()
            ->getRepository(User::class)
            ->getName($id);
        $user = $user->find($id);
        dd($user);

    }
}
