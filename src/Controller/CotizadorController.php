<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CotizadorController extends AbstractController
{
    /**
     * @Route("/cotizador", name="cotizador")
     */
    public function cotizador()
    {
        return $this->render('cotizador/cotizador.html.twig');
    }
}
