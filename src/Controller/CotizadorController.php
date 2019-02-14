<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ServiceCategory;

class CotizadorController extends AbstractController
{
    /**
     * @Route("/cotizador", name="cotizador")
     */

    public function cotizador(){

        $em = $this->getDoctrine()->getManager();

    	$service_categories_repo = $this->getDoctrine()->getRepository(ServiceCategory::class);

    	$service_categories = $service_categories_repo->findAll();

        return $this->render('cotizador/cotizador.html.twig', [
        	'service_categories' => $service_categories

        ]);
    }

}
