<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Film;
use App\Repository\FilmRepository;

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
     * @Route("/stream/site/film", name="list_film")
     */
    public function film()
    {
        $repo = $this->getDoctrine()->getRepository(Film::class);
        $film = $repo->findAll();
        return $this->render('stream_site/film.html.twig', ['title' => 'Liste Films', 'film' => $film, 'var' => false, ]);
    }
    
    /**
     * @Route("/stream/site/film/{id}", name="film")
     */
    public function filma($id)
    {
        $repo = $this->getDoctrine()->getRepository(Film::class);
        $film = $repo->find($id);
        return $this->render('stream_site/film.html.twig', ['title' => 'Le film', 'var' => true, 'film' => $film]);
    }
}
