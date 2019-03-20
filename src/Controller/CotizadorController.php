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
use App\Entity\PaintData;
use App\Entity\WaterproofingData;

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
        $visitor = new Visitor();
        $visitor->setName('visitante');
        $visitor->setCreatedAt(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($visitor);
        $em->flush();

        if ($bases == "" && $alturas == "" && $comentarios == "") {

            $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
            $service_description = $service_description_repo->findBy([
                'id' => $idsServicios,
                'price' => $serviciosConPrecio
            ]);
            for ($i = 0; $i < count($idsServicios); $i++) {
                for ($i = 0; $i < count($serviciosConPrecio); $i++) {
                    $precioTotal = $precioTotal + $serviciosConPrecio[$i];
                    
                    $estimate = new Estimate();
                    $em = $this->getDoctrine()->getManager();
                    $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                    $estimate->setServiceDescription($idDescription);
                    $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                    $estimate->setVisitor($idVisitor);
                    $estimate->setCreatedAt(new \DateTime('now'));
                    $em->persist($estimate);
                    $em->flush();
                    
                }
            }
            $tipo = 0;
            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo,
                'visitor' => $visitor
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
                            foreach ($service_description as $description) {
                                if ($description->getId() == $idsServicios[$i]) {
                                    if ($serviciosConPrecio == "") {
                                        switch ($description->getDescription()) {
                                            case 'Pintura':
                                                $serviciosConPrecio = array($metrosCuadrados[$i] * 50);
                                                break;

                                            case 'Impermeabilizado':
                                                $serviciosConPrecio = array($metrosCuadrados[$i] * 100);
                                                break;
                                        }
                                    }else{
                                        switch ($description->getDescription()) {
                                            case 'Pintura':
                                                array_push($serviciosConPrecio, $metrosCuadrados[$i] * 50);
                                                break;

                                            case 'Impermeabilizado':
                                                array_push($serviciosConPrecio, $metrosCuadrados[$i] * 100);
                                                break;
                                        }
                                    }
                                }
                            }
                            /* Cuando se agregen más servicios aqui los pondre */
                            foreach ($service_description as $description) {
                                if ($description->getId() == $idsServicios[$i]) {
                                    switch ($description->getDescription()) {
                                        case 'Pintura':
                                            $paintData = new PaintData();
                                            $em = $this->getDoctrine()->getManager();
                                            $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                                            $paintData->setServiceDescription($idDescription);
                                            $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                                            $paintData->setVisitor($idVisitor);
                                            $paintData->setBase($bases[$i]);
                                            $paintData->setHeight($alturas[$i]);
                                            $paintData->setSquareMaters($metrosCuadrados[$i]);
                                            $paintData->setPrice($serviciosConPrecio[$i+$count]);
                                            $paintData->setComments($comentarios[$i]);
                                            $paintData->setCreatedAt(new \DateTime('now'));
                                            $em->persist($paintData);
                                            $em->flush();
                                            break;

                                        case 'Impermeabilizado':
                                            $waterproofingData = new WaterproofingData();
                                            $em = $this->getDoctrine()->getManager();
                                            $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                                            $waterproofingData->setServiceDescription($idDescription);
                                            $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                                            $waterproofingData->setVisitor($idVisitor);
                                            $waterproofingData->setBase($bases[$i]);
                                            $waterproofingData->setHeight($alturas[$i]);
                                            $waterproofingData->setSquareMaters($metrosCuadrados[$i]);
                                            $waterproofingData->setPrice($serviciosConPrecio[$i+$count]);
                                            $waterproofingData->setComments($comentarios[$i]);
                                            $waterproofingData->setCreatedAt(new \DateTime('now'));
                                            $em->persist($waterproofingData);
                                            $em->flush();
                                            break;
                                    }
                                }
                            }
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
            for ($i = 0; $i < count($idsServicios); $i++) {
                for ($i = 0; $i < count($serviciosConPrecio); $i++) {
                    $estimate = new Estimate();
                    $em = $this->getDoctrine()->getManager();
                    $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                    $estimate->setServiceDescription($idDescription);
                    $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                    $estimate->setVisitor($idVisitor);
                    $estimate->setCreatedAt(new \DateTime('now'));
                    $em->persist($estimate);
                    $em->flush();
                }
            }
            $tipo = 1;
            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'serviciosConSusValores' => $serviciosConSusValores,
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo,
                'visitor' => $visitor
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
                            foreach ($service_description as $description) {
                                if ($description->getId() == $idsServicios[$i]) {
                                    if ($serviciosConPrecio == "") {
                                        switch ($description->getDescription()) {
                                            case 'Pintura':
                                                $serviciosConPrecio = array($metrosCuadrados[$i] * 50);
                                                break;

                                            case 'Impermeabilizado':
                                                $serviciosConPrecio = array($metrosCuadrados[$i] * 100);
                                                break;
                                        }
                                    }else{
                                        switch ($description->getDescription()) {
                                            case 'Pintura':
                                                array_push($serviciosConPrecio, $metrosCuadrados[$i] * 50);
                                                break;

                                            case 'Impermeabilizado':
                                                array_push($serviciosConPrecio, $metrosCuadrados[$i] * 100);
                                                break;
                                        }
                                    }
                                }
                            }
                            /* Cuando se agregen más servicios aqui los pondre */
                            foreach ($service_description as $description) {
                                if ($description->getId() == $idsServicios[$i]) {
                                    switch ($description->getDescription()) {
                                        case 'Pintura':
                                            $paintData = new PaintData();
                                            $em = $this->getDoctrine()->getManager();
                                            $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                                            $paintData->setServiceDescription($idDescription);
                                            $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                                            $paintData->setVisitor($idVisitor);
                                            $paintData->setBase($bases[$i]);
                                            $paintData->setHeight($alturas[$i]);
                                            $paintData->setSquareMaters($metrosCuadrados[$i]);
                                            $paintData->setPrice($serviciosConPrecio[$i]);
                                            $paintData->setComments($comentarios[$i]);
                                            $paintData->setCreatedAt(new \DateTime('now'));
                                            $em->persist($paintData);
                                            $em->flush();
                                            break;

                                        case 'Impermeabilizado':
                                            $waterproofingData = new WaterproofingData();
                                            $em = $this->getDoctrine()->getManager();
                                            $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                                            $waterproofingData->setServiceDescription($idDescription);
                                            $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                                            $waterproofingData->setVisitor($idVisitor);
                                            $waterproofingData->setBase($bases[$i]);
                                            $waterproofingData->setHeight($alturas[$i]);
                                            $waterproofingData->setSquareMaters($metrosCuadrados[$i]);
                                            $waterproofingData->setPrice($serviciosConPrecio[$i]);
                                            $waterproofingData->setComments($comentarios[$i]);
                                            $waterproofingData->setCreatedAt(new \DateTime('now'));
                                            $em->persist($waterproofingData);
                                            $em->flush();
                                            break;
                                    }
                                }
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
                            $estimate = new Estimate();
                            $em = $this->getDoctrine()->getManager();
                            $idDescription = $em->getRepository('App\Entity\ServiceDescription')->find($idsServicios[$i]);
                            $estimate->setServiceDescription($idDescription);
                            $idVisitor = $em->getRepository('App\Entity\Visitor')->find($visitor->getId());
                            $estimate->setVisitor($idVisitor);
                            $estimate->setCreatedAt(new \DateTime('now'));
                            $em->persist($estimate);
                            $em->flush();
                        }
                    }
                }
            }
            $tipo = 2;
            return $this->render('cotizador/servicios-cotizados.html.twig', [
                'serviciosConSusValores' => $serviciosConSusValores,
                'service_description' => $service_description,
                'precioTotal' => $precioTotal,
                'tipo' => $tipo,
                'visitor' => $visitor
            ]);

        }
    }

    public function userInformation(Request $request, \Knp\Snappy\Pdf $snappy){

        $nombre = $request->get("name");
        $correo = $request->get("email");
        $telefono = $request->get("phone");
        $lugar = $request->get("location");
        $comentario = $request->get("comment");
        $visitor = $request->get("visitor");
        $precioTotal = $request->get("precioTotal");
        $em = $this->getDoctrine()->getManager();
        $serviciosConPrecio = array();

        $estimate_repo = $this->getDoctrine()->getRepository(Estimate::class);
        $estimates = $estimate_repo->findBy([
            'visitor' => $visitor
        ]);

        /* Cuando se agregen más servicios aqui los pondre */
        foreach ($estimates as $estimate) {
            switch ($estimate->getServiceDescription()->getDescription()) {
                case 'Pintura':
                    $paint_repo = $this->getDoctrine()->getRepository(PaintData::class);
                    $paint = $paint_repo->findBy([
                        'visitor' => $visitor
                    ]);
                    array_push($serviciosConPrecio, $paint);
                    break;

                case 'Impermeabilizado':
                    $waterproofing_repo = $this->getDoctrine()->getRepository(WaterproofingData::class);
                    $waterproofing = $waterproofing_repo->findBy([
                        'visitor' => $visitor
                    ]);
                    array_push($serviciosConPrecio, $waterproofing);
                    break;
            }
        }

        foreach ($estimates as $estimate) {
            $estimate->setClientName($nombre);
            $estimate->setClientEmail($correo);
            $estimate->setClientPhone($telefono);
            $estimate->setLocation($lugar);
            $estimate->setComments($comentario);
            $em->persist($estimate);
            $em->flush();
        }

        $html = $this->renderView('pdf.html.twig', array(
            'estimates' => $estimates,
            'precioTotal' => $precioTotal,
            'serviciosConPrecio' => $serviciosConPrecio
        ));
        $filename = sprintf('Cotizacion-Alco.pdf', date('Y-m-d-hh-ss'));

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );

    }

}
