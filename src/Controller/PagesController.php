<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/pages", name="pages")
     */
    public function index(){
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    public function servicios(){
    	return $this->render('pages/servicios.html.twig');
    }

    public function portafolio(){
    	return $this->render('pages/portafolio.html.twig');
    }

    public function nosotros(){
    	return $this->render('pages/nosotros.html.twig');
    }

    public function contacto(){
    	return $this->render('pages/contacto.html.twig');
    }
}
