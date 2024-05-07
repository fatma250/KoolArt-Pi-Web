<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RatingSystemController extends AbstractController
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
}
