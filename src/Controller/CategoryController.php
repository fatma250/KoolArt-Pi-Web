<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_category_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            $mailService = new MailService(); 
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Category Added';
            $htmlContent = $mailService->readHTMLFile('mail/notification/SUCCESS.html');
            $htmlContent = str_replace("{Title}", "Category Added", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Type: ".$category->getType().   "<br>". 
            "Category: ".$category->getCategory().   "<br>"
            
            , $htmlContent);
            
            $mailService->sendMail($recipient, $subject, $htmlContent);

            return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category/new.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_category_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            
            $mailService = new MailService(); 
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Category Updated';
            $htmlContent = $mailService->readHTMLFile('mail/notification/SUCCESS.html');
            $htmlContent = str_replace("{Title}", "Category Updated", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Type: ".$category->getType().   "<br>". 
            "Category: ".$category->getCategory().   "<br>"
            
            , $htmlContent);
            
            $mailService->sendMail($recipient, $subject, $htmlContent);
            return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_category_delete', methods: ['POST'])]
    public function delete(Request $request, Category $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            
            $mailService = new MailService(); 
            $recipient = 'oumaimarais0502@gmail.com';
            $subject = 'Category Removed';
            $htmlContent = $mailService->readHTMLFile('mail/notification/ALERT.html');
            $htmlContent = str_replace("{Title}", "Category Removed", $htmlContent);
            $htmlContent = str_replace("{Description}", 
            "Type: ".$category->getType().   "<br>". 
            "Category: ".$category->getCategory().   "<br>"
            
            , $htmlContent);
            
            $mailService->sendMail($recipient, $subject, $htmlContent);

            $entityManager->flush();
        }

        return $this->redirectToRoute('app_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
