<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\ServiceCategory;
use App\Entity\ServiceDescription;
use App\Entity\Visitor;
use App\Entity\Estimate;

class CotizadorController extends AbstractController
{

    public function cotizador(){

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
        $metrosCuadrados = array();
        $serviciosConSusValores = array();
        $precioTotal = 0;
        /*
            Parametros de la variable tipo
            0 = Solo servicios con precio
            1 = Mixto
            2 = Solo servicios que tengan formulario
        */
        $tipo = 0;

        $estimate = new Estimate();
        $visitor = new Visitor();
        $visitor->setName('visitante');
        $visitor->setCreatedAt(new \DateTime('now'));

        /*
        $em = $this->getDoctrine()->getManager();
        $em->persist($visitor);
        $em->flush();
        */

        if ($bases == "" && $alturas == "" && $comentarios == "") {

            $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
            $service_description = $service_description_repo->findBy([
                'id' => $idsServicios,
                'price' => $serviciosConPrecio
            ]);

            for ($i = 0; $i < count($idsServicios); $i++) {
                for ($i = 0; $i < count($serviciosConPrecio); $i++) {

                    $precioTotal = $precioTotal + $serviciosConPrecio[$i];

                    $estimate->setServiceDescription($idsServicios[$i]);
                    $estimate->setVisitor($visitor->getId());
                    $estimate->setCreatedAt(new \DateTime('now'));

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($estimate);
                    $em->flush();
                    
                    var_dump($estimate);
                    
                }
            }
            
            $tipo = 0;

            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo
            ]);

        }else if (!$serviciosConPrecio == "") {

            $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
            $service_description = $service_description_repo->findBy([
                'id' => $idsServicios
            ]);

            foreach ($service_description as $description) {
                if ($description->getPrice() != 0) {
                    $precioTotal = $precioTotal + $description->getPrice();
                }
            }

            $count = count($serviciosConPrecio);

            for ($i = 0; $i < count($idsServicios); $i++) {
                for ($i = 0; $i < count($bases); $i++) {
                    for ($i = 0; $i < count($alturas); $i++) {
                        for ($i = 0; $i < count($comentarios); $i++) {

                            array_push($metrosCuadrados, $bases[$i] * $alturas[$i]);
                            array_push($serviciosConPrecio, $metrosCuadrados[$i] * 30);
                            array_push($serviciosConSusValores, array(
                                'id' => $idsServicios[$i],
                                'base' => $bases[$i],
                                'altura' => $alturas[$i],
                                'metrosCuadrados' => $metrosCuadrados[$i],
                                'comentario' => $comentarios[$i],
                                'precio' => $serviciosConPrecio[$i+$count]
                            ));
                            $precioTotal = $precioTotal + $serviciosConPrecio[$i+$count];
                        }
                    }
                }
            }

            $tipo = 1;

            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'serviciosConSusValores' => $serviciosConSusValores,
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo
            ]);

        }else{

            $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
            $service_description = $service_description_repo->findBy([
                'id' => $idsServicios,
            ]);

            for ($i = 0; $i < count($idsServicios); $i++) {
                for ($i = 0; $i < count($bases); $i++) {
                    for ($i = 0; $i < count($alturas); $i++) {
                        for ($i = 0; $i < count($comentarios); $i++) {
                            array_push($metrosCuadrados, $bases[$i] * $alturas[$i]);

                            if ($serviciosConPrecio == "") {
                                $serviciosConPrecio = array($metrosCuadrados[$i] * 30);
                            }else{
                                array_push($serviciosConPrecio, $metrosCuadrados[$i] * 30);
                            }

                            array_push($serviciosConSusValores, array(
                                'id' => $idsServicios[$i],
                                'base' => $bases[$i],
                                'altura' => $alturas[$i],
                                'metrosCuadrados' => $metrosCuadrados[$i],
                                'comentario' => $comentarios[$i],
                                'precio' => $serviciosConPrecio[$i]
                            ));
                            $precioTotal = $precioTotal + $serviciosConPrecio[$i];
                        }
                    }
                }
            }

            $tipo = 2;

            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'serviciosConSusValores' => $serviciosConSusValores,
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo
            ]);
        }
    }

}
