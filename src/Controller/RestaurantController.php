<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\ProductRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


#[Route('/restaurant')]
class RestaurantController extends AbstractController
{
    #[Route('/', name: 'app_restaurant_index', methods: ['GET'])]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }
    #[Route('/dash', name: 'app_restaurant_indexdash', methods: ['GET'])]
    public function indexdash(RestaurantRepository $restaurantRepository, Request $request): Response
    {
        if ($request->isXmlHttpRequest()) {
            $searchTerm = $request->query->get('search');
    
            $restaurants = $restaurantRepository->searchRestaurants($searchTerm);
    
            $sort = $request->query->get('sort');
            if ($sort === 'name') {
                usort($restaurants, function($a, $b) {
                    return strcmp($a->getName(), $b->getName());
                });
            }
            $restaurantsArray = [];
            foreach ($restaurants as $restaurant) {
                $restaurantsArray[] = [
                    'id' => $restaurant->getId(),
                    'name' => $restaurant->getName(),
                    'location' => $restaurant->getLocation(),
                    'category' => $restaurant->getCategory()->getCategory(),
                    'image' => $restaurant->getImage(),
                ];
            }
    
            return new JsonResponse(['restaurants' => $restaurantsArray]);
        }
    
        return $this->render('restaurant/indexDash.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }
    

    #[Route('/new', name: 'app_restaurant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $restaurant = new Restaurant();
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                // Generate a unique name for the file
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where your images are stored
                $imageFile->move(
                    $this->getParameter('public_directory').'/uploads',
                    $newFilename
                );

                // Store the file name in the database (assuming 'image' is the attribute in your entity)
                $restaurant->setImage('/uploads/'.$newFilename);
            }

            // Persist the entity
            $entityManager->persist($restaurant);
            $entityManager->flush();

            return $this->redirectToRoute('app_restaurant_indexdash', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_restaurant_show', methods: ['GET'])]
    public function show(Restaurant $restaurant,ProductRepository $rep): Response
    {
        $products = $rep->findBy(['restaurant' => $restaurant]);
        return $this->render('restaurant/show.html.twig', [
            'restaurant' => $restaurant,
            'products' => $products,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_restaurant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Restaurant $restaurant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();

            if ($imageFile) {
                // Generate a unique name for the file
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the public/uploads directory
                $imageFile->move(
                    $this->getParameter('public_directory').'/uploads',
                    $newFilename
                );

                // Store the file name in the database (assuming 'image' is the attribute in your entity)
                $restaurant->setImage('/uploads/'.$newFilename);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_restaurant_indexdash', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_restaurant_delete', methods: ['POST'])]
    public function delete(Request $request, Restaurant $restaurant, EntityManagerInterface $entityManager): Response
    {
            // Delete associated image file if it exists
            $imagePath = $this->getParameter('public_directory') . $restaurant->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $entityManager->remove($restaurant);
            $entityManager->flush();
        

        return $this->redirectToRoute('app_restaurant_indexdash', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/delete/{id}', name: 'app_restaurant_deletee', methods: ['POST','GET'])]
    public function deletee(Request $request, Restaurant $restaurant, EntityManagerInterface $entityManager): Response
    {
            // Delete associated image file if it exists
            $imagePath = $this->getParameter('public_directory') . $restaurant->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $entityManager->remove($restaurant);
            $entityManager->flush();
        

        return $this->redirectToRoute('app_restaurant_indexdash', [], Response::HTTP_SEE_OTHER);
    }
}
