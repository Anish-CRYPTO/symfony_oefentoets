<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BestellingController extends AbstractController
{
    #[Route('/bestelling
    ', name: 'app_bestelling')]
    public function index(Klant $Klant): Response
    {
        $bestellingen = $Klant->gebestelling();
            foreach($bestellingen as $bestelling) {
                $bestelRegels = $bestelling->getbestelregel();
                foreach($bestelRegels as $bestelRegel) {
                    dump($bestelRegels->getPizza()->getName(). " " .$bestelRegel->getAantal());
                }
            }
        return $this->render('bestelling/index.html.twig', [
            'controller_name' => 'BestellingController',
        ]);
    }
}
