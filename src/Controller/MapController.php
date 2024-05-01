<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nucleos\MapsBundle\Model\Map;

class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map')]
    public function map(RestaurantRepository $restaurantRepository): Response
    {
        $restaurants = $restaurantRepository->findAll();
        $markers = [
            
        ];

        foreach ($restaurants as $restaurant) {
            sscanf($restaurant->getLocation(), '%f, %f', $lat, $lng);
            //sta3malna sscanf bich na9ra les variables float ili mawjoudin fil string getlocation() w yconvertehom lil deux
            //variables float latitude w longitude

            $markers[] = ['latitude' => $lat, 'longitude' => $lng];
            //mistansin k nhibou n3amrou tableau na3mlouha par example markers[1] markers[2] etc etc
            // k na3milha markers[] bich y3amar awal case fil tableau ya9aha fer8a par example k tabda il
            //indice 0 1 2 fehom wahdou wahdou yifhim ili hiya lazimha markers[3]
        }
        
        return $this->render('map/index.html.twig', [
            'markers' => $markers,
        ]);
    }

}
