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
use App\Form\CategoryType;


class CategoriesController extends AbstractController
{

    public function listCategories(){

        $service_categories_repo = $this->getDoctrine()->getRepository(ServiceCategory::class);
        $service_categories = $service_categories_repo->findAll();

        return $this->render('pages/lista-de-categorias.html.twig', [
            'service_categories' => $service_categories
        ]);
    }

    public function detail(ServiceCategory $serviceCategory){

        if (!$serviceCategory) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('pages/categoria-detalle.html.twig', [
            'serviceCategory' => $serviceCategory
        ]);

    }

    public function edit(Request $request, ServiceCategory $serviceCategory, UserInterface $user){

        if (!$user || $user->getId() != $serviceCategory->getUser()->getId()) {
            return $this->redirectToRoute('list_categories');
        }

        $form = $this->createForm(CategoryType::class, $serviceCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $serviceCategory->setUpdateAt(new \DateTime('now'));

            $em = $this->getDoctrine()->getManager();
            $em->persist($serviceCategory);
            $em->flush();

            return $this->redirect($this->generateUrl('category_detail', ['id' => $serviceCategory->getId()]));
        }

        return $this->render('pages/crear-categoria.html.twig',[
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

    public function creation(Request $request, UserInterface $user){

        $category = new ServiceCategory();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $category->setCreatedAt(new \DateTime('now'));
            $category->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirect($this->generateUrl('category_detail', ['id' => $category->getId()]));
        }

        return $this->render('pages/crear-categoria.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function delete(ServiceCategory $serviceCategory, UserInterface $user){

        if (!$user || $user->getId() != $serviceCategory->getUser()->getId()) {
            return $this->redirectToRoute('list_categories');
        }

        if (!$serviceCategory) {
            return $this->redirectToRoute('list_categories');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($serviceCategory);
        $em->flush();

        return $this->redirectToRoute('list_categories');

    }

}
