<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\ServiceCategory;
use App\Entity\ServiceDescription;

class CotizadorController extends AbstractController
{

    public function cotizador(){

        $em = $this->getDoctrine()->getManager();
    	$service_categories_repo = $this->getDoctrine()->getRepository(ServiceCategory::class);
    	$service_categories = $service_categories_repo->findAll();

        foreach ($service_categories as $service_category) {
            $service_category->getServiceCategoryName();

            foreach ($service_category->getDescriptions() as $providers) {
                $providers->getProvider();
            }
        }

        return $this->render('cotizador/cotizador.html.twig', [
        	'service_categories' => $service_categories,
            'providers' => $providers
        ]);
    }

    public function listProviders(Request $request){

        $category = $request->get("services");

        $result = "";

        /* Lo comparo con 1 porque se supone que pintura tiene el id 1 y si no pues debe tener string con el nombre pintura*/
        if ($category == 1) {
            $result = "number";
        }else{
            $result = "string";
        }

        /*
        $descriptions_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
        $providers = $descriptions_repo->findBy([
            'provider' => $category
        ]);
        */

        return new Response($result);

        /*
        $em = $this->getDoctrine()->getManager();
        $service_categories_repo = $em->getRepository(ServiceCategory::class);
        
        $dql = "SELECT sd FROM App\Entity\ServiceDescription sd WHERE sd.service_category_id = '$provider'";
        $query = $em->createQuery($dql);
        $result_isset = $query->execute();
        */



    }

}
