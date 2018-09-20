<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\User;
use \App\Form\LoginType;
use \Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function registration(Request $request, ObjectManager $manager)
    {
        $user = new User();
        
        $form = $this->createForm(LoginType::class, $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($user);
            $manager->flush();
        }
        
        return $this->render('login/login.html.twig', [ 'form' => $form->createView(),
        ]);
    }
}
