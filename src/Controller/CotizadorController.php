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

        /*
        foreach ($service_categories as $service_category) {
            $service_category->getServiceCategoryName();

            foreach ($service_category->getDescriptions() as $providers) {
                $providers->getProvider();
            }
        }
        */

        return $this->render('cotizador/cotizador.html.twig', [
        	'service_categories' => $service_categories
        ]);
    }

    public function listProviders(Request $request){

        $category = $request->get("services");

        /* Lo comparo con 1 porque se supone que pintura tiene el id 1 y si no pues debe tener string con el nombre pintura */
        
        /*
        if ($category == 1) {
            $result = "number";
        }else{
            $result = "string";
        }
        */

        $descriptions_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
        $providers = $descriptions_repo->findBy([
            'serviceCategory' => $category
        ]);

        /* Estoy recorriendo los provedores para sacar el nombre de cada uno pero en ajax solo recibe el nombre del ultimo, no todos asi ques hay que ver como conseguir todos */
        if (count($providers) >= 1) {
            foreach ($providers as $provider) {
                $result = $provider->getProvider();
            }
            var_dump($providers);
        }else{
            $result = "Sabra que hace";
        }

        /*
        $em = $this->getDoctrine()->getManager();
        $descriptions_repo = $em->getRepository(ServiceDescription::class);
        
        $dql = "SELECT provider FROM service_description WHERE service_category_id = '$category'";
        $query = $em->createQuery($dql);
        $result = $query->execute();
        */

        return new Response($result);

    }

}
