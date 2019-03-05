<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\User\UserInterface;

use App\Entity\ServiceCategory;
use App\Entity\ServiceDescription;
use App\Form\ServiceType;

class DescriptionsController extends AbstractController
{

	public function listServices(){

        $service_categories_repo = $this->getDoctrine()->getRepository(ServiceCategory::class);
    	$service_categories = $service_categories_repo->findAll();

        $service_description_repo = $this->getDoctrine()->getRepository(ServiceDescription::class);
        $service_description = $service_description_repo->findAll();
        
        return $this->render('pages/lista-de-servicios.html.twig', [
        	'service_categories' => $service_categories,
            'service_description' => $service_description
        ]);
    }

    public function detail(ServiceDescription $serviceDescription){

        if (!$serviceDescription) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('pages/servicio-detalle.html.twig', [
            'serviceDescription' => $serviceDescription
        ]);

    }

    public function delete(ServiceDescription $serviceDescription, UserInterface $user){

        if (!$serviceDescription) {
            return $this->redirectToRoute('list_services');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($serviceDescription);
        $em->flush();

        return $this->redirectToRoute('list_services');

    }

    public function creation(Request $request, UserInterface $user){

        $service = new ServiceDescription();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $service->setCreatedAt(new \DateTime('now'));
            $service->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($service);
            $em->flush();

            return $this->redirect($this->generateUrl('service_detail', ['id' => $service->getId()]));
        }

        return $this->render('pages/crear-servicio.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function edit(Request $request, ServiceDescription $serviceDescription, UserInterface $user){

        if (!$user || $user->getId() != $serviceDescription->getUser()->getId()) {
            return $this->redirectToRoute('list_services');
        }

        $form = $this->createForm(ServiceType::class, $serviceDescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $serviceDescription->setUpdateAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($serviceDescription);
            $em->flush();

            return $this->redirect($this->generateUrl('service_detail', ['id' => $serviceDescription->getId()]));
        }

        return $this->render('pages/crear-servicio.html.twig',[
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

}
