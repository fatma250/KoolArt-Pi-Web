<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\ProductRepository;
use App\Repository\RestaurantRepository;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Knp\Component\Pager\PaginatorInterface;
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
    public function indexdash(EntityManagerInterface $em,RestaurantRepository $restaurantRepository, Request $request, PaginatorInterface $paginator): Response
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
    
        $queryBuilder = $restaurantRepository->createQueryBuilder('r'); //yjib liste resto

        

        $pagination = $paginator->paginate(
            $queryBuilder, // ili bich twarehom "tableau"
            $request->query->getInt('page', 1), // b chnouwa yabda "ana page yabda beha
            3 // 9adech ywari f kol page
        );

        return $this->render('restaurant/indexDash.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
            'pagination' => $pagination,
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
                
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                
                $imageFile->move(
                    $this->getParameter('public_directory').'/uploads',
                    $newFilename
                );

                
                $restaurant->setImage('/uploads/'.$newFilename);
            }

            
            $entityManager->persist($restaurant);
            $entityManager->flush();
            
            
            $mailService = new MailService(); 
            
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Restaurant Added';

            $htmlContent = $mailService->readHTMLFile('mail/notification/SUCCESS.html');

            $htmlContent = str_replace("{Title}", "Restaurant Added", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Name: ".$restaurant->getName().   "<br>". 
            "Location: ".$restaurant->getLocation().   "<br>"
            
            , $htmlContent);

            //str_replace => string replace
            //("chnouwa tbadal","b chnouwa tbadlou","win tbaldou")
            
            $mailService->sendMail($recipient, $subject, $htmlContent);


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
                
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                
                $imageFile->move(
                    $this->getParameter('public_directory').'/uploads',
                    $newFilename
                );

                
                $restaurant->setImage('/uploads/'.$newFilename);
            }

            $entityManager->flush();

            $mailService = new MailService(); 
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Restaurant Updated';
            $htmlContent = $mailService->readHTMLFile('mail/notification/SUCCESS.html');
            $htmlContent = str_replace("{Title}", "Product Updated", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Name: ".$restaurant->getName().   "<br>". 
            "Location: ".$restaurant->getLocation().   "<br>"
            
            , $htmlContent);
            
            $mailService->sendMail($recipient, $subject, $htmlContent);

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
            
            $imagePath = $this->getParameter('public_directory') . $restaurant->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $entityManager->remove($restaurant);
            $entityManager->flush();
        
            $mailService = new MailService(); 
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Restaurant Removed';
            $htmlContent = $mailService->readHTMLFile('mail/notification/ALERT.html');
            $htmlContent = str_replace("{Title}", "Product Removed", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Name: ".$restaurant->getName().   "<br>". 
            "Location: ".$restaurant->getLocation().   "<br>"
            
            , $htmlContent);
            
            $mailService->sendMail($recipient, $subject, $htmlContent);

        return $this->redirectToRoute('app_restaurant_indexdash', [], Response::HTTP_SEE_OTHER);
    }
}
