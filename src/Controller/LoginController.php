<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\User;
use \App\Form\LoginType;
use \App\Form\RegistrationType;
use \Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class LoginController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        
        $form = $this->createForm(RegistrationType::class, $user);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid())
        {
            $pwd = $encoder->encodePassword($user, $user->getPassword());
            
            $user->setPassword($pwd);
            
            $manager->persist($user);
            $manager->flush();
            
            return $this->redirectToRoute('login');
        }
        
        return $this->render('login/registration.html.twig', [ 'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('login/login.html.twig');
    }
    
    /**
     * @Route("/deconnexion", name="logout")
     */
    public function logout()
    {
        
    }
}
