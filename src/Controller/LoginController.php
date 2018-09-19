<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\User;
use \App\Form\LoginType;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function registration()
    {
        $user = new User();
        
        $form = $this->createForm(LoginType::class, $user);
        return $this->render('login/login.html.twig', [ 'form' => $form->createView(),
        ]);
    }
}
