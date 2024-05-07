<?php

namespace App\Controller;

use App\Entity\Table;
use App\Form\TableType;
use App\Repository\TableRepository;
use App\Service\MailService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends AbstractController
{
    #[Route('/admin/table', name: 'app_back_table')]
    public function index(Request $request,TableRepository $tableRepository): Response
    {
        $searchQuery = $request->query->get('search');
        $searchBy = $request->query->get('search_by', 'idTable');

        $sortBy = $request->query->get('sort_by', 'idTable');
        $sortOrder = $request->query->get('sort_order', 'asc');

        $items = $tableRepository->findBySearchAndSort($searchBy,$searchQuery, $sortBy, $sortOrder);

        return $this->render('back/pages/table/index.html.twig',[
            "items" => $items
        ]);
    }
    #[Route('/admin/table/add', name: 'app_back_table_add')]
    public function add(Request $request,ManagerRegistry $mr): Response
    {
        $table = new Table();
        $form = $this->createForm(TableType::class, $table);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($table);
            $em->flush();    

            flash()->addSuccess('Table was Added');

            return $this->redirectToRoute('app_back_table');
        }
    
        return $this->render('back/pages/table/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/admin/table/update/{id}', name: 'app_back_table_update')]
    public function update(Request $request,ManagerRegistry $mr,$id,tableRepository $tableRepository): Response
    {
        $table = $tableRepository->find($id);
        $form = $this->createForm(tableType::class, $table);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $mr->getManager();
            $em->persist($table);
            $em->flush();    
            flash()->addSuccess('Table was Updated');

            return $this->redirectToRoute('app_back_table');
        }
    
        return $this->render('back/pages/table/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/table/delete/{id}', name: 'app_back_table_delete')]
    public function delete(tableRepository $tableRepository,int $id,ManagerRegistry $mr): Response
    {        
        $table = $tableRepository->find($id);
        $entityManager = $mr->getManager();
        $entityManager->remove($table);
        $entityManager->flush();
        flash()->addError('Table was deleted');

        return $this->redirectToRoute('app_back_table');
    }
}
