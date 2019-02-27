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

        return $this->render('cotizador/precios.html.twig', [
            'descriptions' => $descriptions
        ]);

    }

    public function formData(Request $request){

        $bases = $request->get("base");
        $alturas = $request->get("altura");
        $comentarios = $request->get("comentarios");
        $serviciosConPrecio = $request->get("serviciosConPrecio");
        $idsServicios = $request->get("idsServicios");

        for ($i = 0; $i < count($idsServicios); $i++) {
            for ($i = 0; $i < count($bases); $i++) {
                for ($i = 0; $i < count($alturas); $i++) {
                    for ($i = 0; $i < count($comentarios); $i++) {
                        echo "Id Servicio: " . $idsServicios[$i] . "<br/>";
                        echo "Base: " . $i . " Mide: " . $bases[$i] . "<br/>";
                        echo "Altura: " . $i . " Mide: " . $alturas[$i] . "<br/>";
                        echo "Comentario: " . $i . " Dice: " . $comentarios[$i] . "<br/>";
                        $metrosCuadrados = $bases[$i] * $alturas[$i];
                        echo "Metros Cuadrados: " . " Mide: " . $metrosCuadrados . "<br/><br/>";
                    }
                }
            }
        }

        var_dump($bases);
        var_dump($alturas);
        var_dump($comentarios);
        var_dump($serviciosConPrecio);
        var_dump($idsServicios);
        

        return $this->render('cotizador/servicios-cotizados.html.twig', [
            
        ]);

    }

}
