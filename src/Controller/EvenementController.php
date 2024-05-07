<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Ratingsystem;
use App\Form\EvenementType;
use App\Form\RatingsystemType;
use App\Repository\EvenementRepository;
use App\Repository\RatingsystemRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EvenementController extends AbstractController
{
    
    #[Route('/admin/Evenement', name: 'app_back_Evenement')]
    public function index(Request $request,EvenementRepository $EvenementRepository): Response
    {
        $searchQuery = $request->query->get('search');
        $searchBy = $request->query->get('search_by', 'id');

        $sortBy = $request->query->get('sort_by', 'id');
        $sortOrder = $request->query->get('sort_order', 'asc');

        $items = $EvenementRepository->findBySearchAndSort($searchBy,$searchQuery, $sortBy, $sortOrder);

        return $this->render('back/pages/Evenement/index.html.twig',[
            "items" => $items
        ]);
    }

    
    #[Route('/admin/Evenement/add', name: 'app_back_Evenement_add')]
    public function add(Request $request,ManagerRegistry $mr,ValidatorInterface $validator): Response
    {
        $Evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $Evenement);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($Evenement);
            $em->flush();
            return $this->redirectToRoute('app_back_Evenement');
        }
    
        return $this->render('back/pages/Evenement/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/admin/Evenement/update/{id}', name: 'app_back_Evenement_update')]
    public function update(Request $request,ManagerRegistry $mr,$id,EvenementRepository $EvenementRepository): Response
    {
        $Evenement = $EvenementRepository->find($id);
        $form = $this->createForm(EvenementType::class, $Evenement);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($Evenement);
            $em->flush();    
            return $this->redirectToRoute('app_back_Evenement');
        }
    
        return $this->render('back/pages/Evenement/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/Evenement/delete/{id}', name: 'app_back_Evenement_delete')]
    public function delete(EvenementRepository $EvenementRepository,int $id,ManagerRegistry $mr): Response
    {        
        $Evenement = $EvenementRepository->find($id);
        $entityManager = $mr->getManager();
        $entityManager->remove($Evenement);
        $entityManager->flush();

        return $this->redirectToRoute('app_back_Evenement');
    }

    #[Route('/Evenement', name: 'app_front_Evenement')]
    public function indexFront(Request $request,EvenementRepository $EvenementRepository,RatingsystemRepository $RatingsystemRepository): Response
    {
        $searchQuery = $request->query->get('search');
        $searchBy = $request->query->get('search_by', 'id');

        $sortBy = $request->query->get('sort_by', 'id');
        $sortOrder = $request->query->get('sort_order', 'asc');

        $items = $EvenementRepository->findBySearchAndSort($searchBy,$searchQuery, $sortBy, $sortOrder);
        
        $ratings = [];

        foreach ($items as $item) {
            $eventId = $item->getId();
            $eventRatings = $RatingsystemRepository->findBy(['eventid' => $eventId]);
            $totalRating = 0;
            $numRatings = count($eventRatings);
            
            // Calculate total rating
            foreach ($eventRatings as $rating) {
                $totalRating += $rating->getNote();
            }
            
            $averageRating = $numRatings > 0 ? $totalRating / $numRatings : 0;
            $averageRating = number_format($averageRating, 1); 
            $ratings[$eventId] = $averageRating;
        }


        return $this->render('front/pages/Evenement/index.html.twig',[
            "items" => $items,
            "rating" => $ratings
        ]);
    }
    #[Route('/Evenement/Rate/{id}', name: 'app_front_Evenement_Rating')]
    public function indexFrontRate(int $id,Request $request,EvenementRepository $EvenementRepository,ManagerRegistry $mr): Response
    {
        $Evenement = $EvenementRepository->find($id);
        $Ratingsystem = new Ratingsystem();
        $form = $this->createForm(RatingsystemType::class, $Ratingsystem);
        
        $form->handleRequest($request);

        $Ratingsystem->setEventid($Evenement);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($Ratingsystem);
            $em->flush();
            return $this->redirectToRoute('app_front_Evenement');
        }
    
        return $this->render('front/pages/Evenement/form.html.twig', [
            'form' => $form->createView(),
            'eventId' => $id
        ]);
    }
}
