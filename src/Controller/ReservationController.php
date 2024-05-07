<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Service\MailService;
use App\Service\TwilioService;
use Doctrine\Persistence\ManagerRegistry;
use Dompdf\Dompdf;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{   

    #[Route('/admin/reservation', name: 'app_back_reservation')]
    public function index(Request $request,ReservationRepository $reservationRepository,BuilderInterface $qrBuilder): Response
    {
        $searchQuery = $request->query->get('search');
        $searchBy = $request->query->get('search_by', 'idReservation');

        $sortBy = $request->query->get('sort_by', 'idReservation');
        $sortOrder = $request->query->get('sort_order', 'asc');

        $items = $reservationRepository->findBySearchAndSort($searchBy,$searchQuery, $sortBy, $sortOrder);

        $qrCodes = [];

        foreach ($items as $item) {
            $qrData = json_encode([
                'idReservation' => $item->getIdReservation(),
                'idUser' => $item->getIdUser(),
                'dateReservation' => $item->getDateReservation()->format('d-m-Y'),
                'nombrePersonnes' => $item->getNombrePersonnes(),
                'idTable' => $item->getIdTable()->getIdTable(),
                'idRestaurant' => $item->getIdRestaurant(),
                'heureReservation' => $item->getHeureReservation(),
            ]);
            

            $qrResult = $qrBuilder
                ->size(200)
                ->margin(20)
                ->data($qrData)
                ->build();
            
            $qrCode = $qrResult->getDataUri();

            $qrCodes[] = $qrCode;
            
        }

        return $this->render('back/pages/reservation/index.html.twig', [
            "items" => $items,
            "qrCodes" => $qrCodes
        ]);
    }
    #[Route('/admin/reservation/add', name: 'app_back_reservation_add')]
    public function add(Request $request,ManagerRegistry $mr): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($reservation);
            $em->flush();    

            flash()->addSuccess('Reservation was Added');


            return $this->redirectToRoute('app_back_reservation');
        }
    
        return $this->render('back/pages/reservation/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/admin/reservation/update/{id}', name: 'app_back_reservation_update')]
    public function update(Request $request,ManagerRegistry $mr,$id,ReservationRepository $reservationRepository): Response
    {
        $reservation = $reservationRepository->find($id);
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($reservation);
            $em->flush();    

            flash()->addSuccess('Reservation was Updated');

            return $this->redirectToRoute('app_back_reservation');
        }
    
        return $this->render('back/pages/reservation/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/reservation/delete/{id}', name: 'app_back_reservation_delete')]
    public function delete(ReservationRepository $reservationRepository,int $id,ManagerRegistry $mr): Response
    {        
        $reservation = $reservationRepository->find($id);
        $entityManager = $mr->getManager();
        $entityManager->remove($reservation);
        $entityManager->flush();
        flash()->addError('Reservation was deleted');

        return $this->redirectToRoute('app_back_reservation');
    }

    #[Route('/admin/reservation/sendSms/{id}', name: 'app_back_reservation_sendSms')]
    public function sendSMS(int $id, ReservationRepository $reservationRepository): Response
    {
        $reservation = $reservationRepository->find($id);

        $recipient = '+21698114538';
        $message = 'Reminder you have a reservation at '. $reservation->getDateReservation()->format("m/d/y").
        " for ". $reservation->getNombrePersonnes()." Person";

        $twilioService = new TwilioService('', '', '+15807864750');
        $isSent = $twilioService->sendSMS($recipient, $message);

        if ($isSent) {
            return $this->redirectToRoute('app_back_reservation');
        } else {
            return new Response('Failed to send SMS.');
        }
    }
    

    #[Route('/admin/reservation/pdf/{id}', name: 'app_back_reservation_pdf')]
    public function generatePdf(int $id,ReservationRepository $reservationRepository): Response
    {
        // Retrieve reservation from the repository
    $reservation = $reservationRepository->find($id);

    // Check if reservation exists
    if (!$reservation) {
        throw $this->createNotFoundException('Reservation not found');
    }

    // Construct HTML content
    $htmlFilePath = $this->getParameter('kernel.project_dir') . '/public/pdf/reservation.html';
    $html = file_get_contents($htmlFilePath);

    // Check if HTML content was loaded successfully
    if ($html === false) {
        throw new \Exception('Failed to load HTML content');
    }

    // Replace placeholders in HTML content with reservation data
    $html = str_replace('{today}', date("m/d/y"), $html);
    $html = str_replace('{dateReservation}', $reservation->getDateReservation()->format("m/d/y"), $html);
    $html = str_replace('{nbrPerson}', $reservation->getNombrePersonnes(), $html);

    $dompdf = new Dompdf();

    // Load HTML into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Get PDF content
    $pdfContent = $dompdf->output();

    // Create response with PDF content
    $response = new Response($pdfContent);

    // Set response headers
    $response->headers->set('Content-Type', 'application/pdf');
    $response->headers->set('Content-Disposition', 'attachment; filename="reservation.pdf"');

    return $response;
    }
}
