<?php

namespace App\Controller;

use App\Entity\Forumpost;
use App\Form\ForumpostType;
use App\Repository\ForumpostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/forumpost')]
class ForumpostController extends AbstractController
{
    #[Route('/', name: 'app_forumpost_index', methods: ['GET'])]
    public function index(ForumpostRepository $forumpostRepository): Response
    {
        return $this->render('forumpost/index.html.twig', [
            'forumposts' => $forumpostRepository->findAll(),
        ]);
    }


    #[Route('/new', name: 'app_forumpost_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $forumpost = new Forumpost();
        $form = $this->createForm(ForumpostType::class, $forumpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle the image upload
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('content')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // This ensures that the filename is unique
                $newFilename = $originalFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception if something happens during file upload
                }

                // Update the image path in the actualite entity
                $forumpost->setContent($newFilename);
            }
            $entityManager->persist($forumpost);
            $entityManager->flush();

            return $this->redirectToRoute('app_forumpost_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('forumpost/new.html.twig', [
            'forumpost' => $forumpost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_forumpost_show', methods: ['GET'])]
    public function show(Forumpost $forumpost): Response
    {
        return $this->render('forumpost/show.html.twig', [
            'forumpost' => $forumpost,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_forumpost_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Forumpost $forumpost, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ForumpostType::class, $forumpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_forumpost_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('forumpost/edit.html.twig', [
            'forumpost' => $forumpost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_forumpost_delete', methods: ['POST'])]
    public function delete(Request $request, Forumpost $forumpost, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forumpost->getId(), $request->request->get('_token'))) {
            $entityManager->remove($forumpost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_forumpost_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/forumpost/{id}/commentaire', name: 'app_forumpost_commentaire', methods: ['GET', 'POST'])]
    public function commentaire(Request $request, Forumpost $forumpost, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ForumpostType::class, $forumpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { // Handle the image upload
            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('content')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // This ensures that the filename is unique
                $newFilename = $originalFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception if something happens during file upload
                }

                // Update the image path in the actualite entity
                $forumpost->setContent($newFilename);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_forumpost_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('app/commentaire.html.twig', [
            'forumpost' => $forumpost,
            'form' => $form,
        ]);
    }
}