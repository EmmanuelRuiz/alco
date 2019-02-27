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

        $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
        $service_description = $service_description_repo->findAll();
        
        return $this->render('cotizador/cotizador.html.twig', [
        	'service_categories' => $service_categories,
            'service_description' => $service_description
        ]);
    }

    public function prices(Request $request){

        $services = $request->get("services");

        

            $descriptions_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
            $descriptions = $descriptions_repo->findBy([
                'id' => $services
            ]);

            /*
            foreach($description as $prices ) {
                $prices->getPrice();
            }
            */

        return $this->render('cotizador/precios.html.twig', [
            'descriptions' => $descriptions
        ]);

        /* Estoy recorriendo los provedores para sacar el nombre de cada uno pero en ajax solo recibe el nombre del ultimo, no todos asi ques hay que ver como conseguir todos */
        /*
        if (count($providers) >= 1) {
            foreach ($providers as $provider) {
                $result = $provider->getProvider();
            }
            var_dump($providers);
        }else{
            $result = "Sabra que hace";
        }
        */

        /*
        $em = $this->getDoctrine()->getManager();
        $descriptions_repo = $em->getRepository(ServiceDescription::class);
        
        $dql = "SELECT provider FROM service_description WHERE service_category_id = '$category'";
        $query = $em->createQuery($dql);
        $result = $query->execute();
        */

        //return new Response($result);

    }

}
