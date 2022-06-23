<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VinylController extends AbstractController
{
    /**
        * @Route("/")
        */
    public function homepage(): Response
    {
        return new Response('<html><body>Lucky number: </body></html>');
    }
}