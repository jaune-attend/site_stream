<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StreamSiteController extends AbstractController
{
    /**
     * @Route("/stream/site", name="stream_site")
     */
    public function index()
    {
        return $this->render('stream_site/index.html.twig', [
            'controller_name' => 'StreamSiteController',
        ]);
    }
    
    /**
     * @Route("/stream/site/accueil", name="home")
     */
    public function home()
    {
        return $this->render('stream_site/home.html.twig', ['title' => 'Accueil']);
    }
    
    /**
     * @Route("/stream/site/film", name="film")
     */
    public function film()
    {
        return $this->render('stream_site/film.html.twig', ['title' => 'Film']);
    }
    
//    /**
//     * @Route("/stream/site/film/{id}", name="film")
//     */
//    public function film(Film $film, $id)
//    {
//        
//    }
}
