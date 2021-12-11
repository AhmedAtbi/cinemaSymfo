<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\Categories;
use App\Entity\Soon;
use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;


class CinemaController extends AbstractController
{

    Private $security;

    public function __construct(Security $security){
        $this->security = $security;
    }
    /**
     * @Route("/home", name="home")
     */
    public function home(AnnoncesRepository $AnnoncesRepository)
    {
        $repo=$this->getDoctrine()->getRepository(Annonces::class);
        $ann=$repo->findAll();
        $repos=$this->getDoctrine()->getRepository(Soon::class);
        $son=$repos->findAll();
        return $this->render('cinema/home.html.twig', [
            "annonces"=>$ann , "soon"=>$son ]);
    }




      /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('cinema/about.html.twig', [
            'controller_name' => 'CinemaController',
        ]);
    }



          /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('cinema/contact.html.twig', [
            'controller_name' => 'CinemaController',
        ]);
    }



    
    /**
     * @Route("/movie", name="movie")
     */
    public function movie(AnnoncesRepository $AnnoncesRepository)
    {
        
        $repo=$this->getDoctrine()->getRepository(Annonces::class);
        $ann=$repo->findBy(['categorie'=>'1']);
        return $this->render('cinema/movie.html.twig', [
            "annonces"=>$ann
            
        ]);
    }


        /**
     * @Route("/serie", name="serie")
     */
    public function serie(AnnoncesRepository $AnnoncesRepository)
    {
        
        $repo=$this->getDoctrine()->getRepository(Annonces::class);
        $ann=$repo->findBy(['categorie'=>'2']);
        return $this->render('cinema/serie.html.twig', [
            "annonces"=>$ann
            
        ]);
    }

           /**
     * @Route("/show{id}", name="show")
     */
    public function show($id , Request $request)
    {
        
        $entityManager = $this->getDoctrine()->getManager();
        $annonce = $entityManager->getRepository(Annonces::class)->find($id);
        $genre = $annonce->getGenre();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

       


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setGenre($genre);
            $reservation->setClient($this->security->getUser());
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            return $this->redirectToRoute('home');
        }

        return $this->render('cinema/show.html.twig', [
    
            "annonces" => $annonce,
            'form' => $form->createView()          
        ]);
    }

       
      
    
                 


}
