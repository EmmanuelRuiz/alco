<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\ContactType;

class ContactController extends AbstractController
{

    public function contact(Request $request, \Swift_Mailer $mailer){
        
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $contactFormData = $form->getData();

            $message = (new \Swift_Message('Nuevo mensaje del sitio web de Alco'))
                ->setFrom($contactFormData['email'])
                ->setTo('alco@alcoplaya.com')
                ->addPart('A continuación se muestra la información del cliente <br><br>
                        Nombre(s): ' . $contactFormData['name'] . '<br>
                        Apellido(s): ' . $contactFormData['lastname'] . '<br>
                        Correo: ' . $contactFormData['email'] . '<br>
                        Teléfono: ' . $contactFormData['phone'] . '<br>
                        Ciudad: ' . $contactFormData['city'] . '<br>
                        Comentarios: ' . $contactFormData['message'] . '<br>', 'text/html');
            $mailer->send($message);

            return $this->redirectToRoute('contact');

        }

        return $this->render('pages/contacto.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
