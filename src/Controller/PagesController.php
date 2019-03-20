<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Estimate;

class PagesController extends AbstractController
{
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

    public function arquitectura(){
    	return $this->render('pages/servicios/arquitectura.html.twig');
    }

    public function obraCivil(){
    	return $this->render('pages/servicios/obra-civil.html.twig');
    }

    public function acabados(){
    	return $this->render('pages/servicios/acabados.html.twig');
    }

    public function hidraulicasSanitarias(){
    	return $this->render('pages/servicios/hidraulicas-sanitarias.html.twig');
    }

    public function instalacionesElectricas(){
    	return $this->render('pages/servicios/instalaciones-electricas.html.twig');
    }

    public function albercas(){
    	return $this->render('pages/servicios/albercas.html.twig');
    }

    public function fumigacion(){
    	return $this->render('pages/servicios/fumigacion.html.twig');
    }

    public function airesAcondicionados(){
    	return $this->render('pages/servicios/aires-acondicionados.html.twig');
    }

    public function instalacionesGas(){
    	return $this->render('pages/servicios/instalaciones-de-gas.html.twig');
    }

    public function palapasPergolas(){
    	return $this->render('pages/servicios/palapas-pergolas.html.twig');
    }

    public function electrodomesticos(){
    	return $this->render('pages/servicios/electrodomesticos.html.twig');
    }
    
}
