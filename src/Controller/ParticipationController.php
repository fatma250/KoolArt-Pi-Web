<?php

namespace App\Controller;

use App\Entity\Participation;
use App\Form\ParticipationType;
use App\Repository\ParticipationRepository;
use App\Repository\EvenementRepository;
use App\Service\TwilioService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipationController extends AbstractController
{
    #[Route('/admin/Participation', name: 'app_back_Participation')]
    public function index(Request $request,ParticipationRepository $ParticipationRepository): Response
    {
        $searchQuery = $request->query->get('search');
        $searchBy = $request->query->get('search_by', 'participationId');

        $sortBy = $request->query->get('sort_by', 'participationId');
        $sortOrder = $request->query->get('sort_order', 'asc');

        $items = $ParticipationRepository->findBySearchAndSort($searchBy,$searchQuery, $sortBy, $sortOrder);

        return $this->render('back/pages/Participation/index.html.twig',[
            "items" => $items
        ]);
    }
    #[Route('/admin/Participation/add', name: 'app_back_Participation_add')]
    public function add(Request $request,ManagerRegistry $mr): Response
    {
        $Participation = new Participation();
        $form = $this->createForm(ParticipationType::class, $Participation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($Participation);
            $em->flush();    
            return $this->redirectToRoute('app_back_Participation');
        }
    
        return $this->render('back/pages/Participation/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/admin/Participation/update/{id}', name: 'app_back_Participation_update')]
    public function update(Request $request,ManagerRegistry $mr,$id,ParticipationRepository $ParticipationRepository): Response
    {
        $Participation = $ParticipationRepository->find($id);
        $form = $this->createForm(ParticipationType::class, $Participation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($Participation);
            $em->flush();    
            return $this->redirectToRoute('app_back_Participation');
        }
    
        return $this->render('back/pages/Participation/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/Participation/delete/{id}', name: 'app_back_Participation_delete')]
    public function delete(ParticipationRepository $ParticipationRepository,int $id,ManagerRegistry $mr): Response
    {        
        $Participation = $ParticipationRepository->find($id);
        $entityManager = $mr->getManager();
        $entityManager->remove($Participation);
        $entityManager->flush();

        return $this->redirectToRoute('app_back_Participation');
    }

    #[Route('/admin/Participation/sendSms/{id}', name: 'app_back_reservation_sendSms')]
    public function sendSMS(int $id, EvenementRepository $EvenementRepository): Response
    {
        $Event = $EvenementRepository->find($id);

        $recipient = '+21653700016';
        $message = 'Reminder you have an event at '. $Event->getDate()->format("m/d/y");

        $twilioService = new TwilioService(' ', ' ', '+14172135216');
        $isSent = $twilioService->sendSMS($recipient, $message);

        if ($isSent) {
            return $this->redirectToRoute('app_front_Evenement');
        } else {
            return new Response('Failed to send SMS.');
        }
    }
}
