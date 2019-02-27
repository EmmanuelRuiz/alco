<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\User\UserInterface;

use App\Entity\User;
use App\Form\RegisterType;

class UserController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder){
        
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setRoleUser('ROLE_USER');
            $user->setCreatedAt(new \DateTime('now'));
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('collaborators');

        }

        return $this->render('pages/registro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function login(AuthenticationUtils $authenticationUtils){

        $error = $authenticationUtils->getLastAuthenticationError();

        $last_username = $authenticationUtils->getLastUsername();

        return $this->render('pages/login.html.twig', [
            'error' => $error,
            'last_username' => $last_username
        ]);
        
    }    

    public function dashboard(){

        return $this->render('pages/panel-de-control.html.twig', [

        ]);
    }

    public function collaborators(){

        $collaborators_repo = $this->getDoctrine()->getRepository(User::class);
        $collaborators = $collaborators_repo->findAll();

        return $this->render('pages/lista-de-colaboradores.html.twig', [
            'collaborators' => $collaborators
        ]);
    }

    public function detail(User $user){ 

        if (!$user) {
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('pages/colaborador-detalle.html.twig', [
            'user' => $user
        ]);

    }

    public function edit(Request $request, User $user, UserPasswordEncoderInterface $encoder, UserInterface $app){

        $password = $app->getPassword();
        $email = $app->getEmail();

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setEmail($email);
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('collaborator_detail', ['id' => $user->getId()]));

        }

        return $this->render('pages/registro.html.twig',[
            'edit' => true,
            'form' => $form->createView()
        ]);
    }

    public function delete(User $user){

        if (!$user) {
            return $this->redirectToRoute('collaborators');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('collaborators');

    }

}
