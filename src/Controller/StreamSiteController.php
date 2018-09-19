<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Film;
use App\Repository\FilmRepository;
use App\Repository\CategoryRepository;

class StreamSiteController extends AbstractController
{
    /**
     * @Route("/stream/site", name="stream_site")
     */
    public function index()
    {
        return $this->render('stream_site/home.html.twig', [
            'title' => 'Accueil',
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
    public function film(FilmRepository $repo)
    {
        $film = $repo->findAll();
        return $this->render('stream_site/film.html.twig', ['title' => 'Liste Films', 'film' => $film, 'var' => false, ]);
    }
    
    /**
     * @Route("/stream/site/film/{id}", name="film")
     */
    public function filma($id, FilmRepository $repo)
    {
        $film = $repo->find($id);
        return $this->render('stream_site/film.html.twig', ['title' => 'Le film', 'var' => true, 'film' => $film]);
    }
    
    /**
     * @Route("/stream/site/categorie", name="categorie")
     */
    public function categorie(CategoryRepository $repo)
    {
        $categorie = $repo->findAll();
        
        return $this->render('stream/site/categorie.html.twig', ['categorie' => $categorie, 'title' => 'Les catégories']);
    }
}
