<?php

namespace App\Controller;

use App\Entity\Forumpost;
use App\Form\ForumpostType;
use App\Repository\ForumpostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/forumpost')]
class ForumpostController extends AbstractController
{
//    #[Route('/', name: 'app_forumpost_index', methods: ['GET'])]
//    public function index(ForumpostRepository $forumpostRepository): Response
//    {
//        return $this->render('forumpost/index.html.twig', [
//            'forumposts' => $forumpostRepository->findAll(),
//        ]);
//    }


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
    //pagination
    #[Route('/', name: 'app_forumpost_index', methods: ['GET'])]
    public function forumpost (Request $request, ForumpostRepository $forumpostRepository, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $forumpostRepository->findAll(),
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('forumpost/index.html.twig', [
            'pagination' => $pagination,
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
//recherche
    #[Route('/forumpost/search', name: 'app_forumpost_search', methods: ['GET'])]
    public function search(Request $request, ForumpostRepository $forumpostRepository, PaginatorInterface $paginator): Response
    {
        $query = $request->query->get('query');
        if ($query) {
            $forumposts = $forumpostRepository->createQueryBuilder('a')
                ->where('a.title LIKE :query')
                ->setParameter('query', '%' . $query . '%')
                ->getQuery();


            $pagination = $paginator->paginate(
                $forumposts,
                $request->query->getInt('page', 1),
                10
            );
        } else {

            $pagination = null;
        }

        return $this->render('forumpost/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
    //tri
    #[Route('/forumpost/tri', name: 'app_forumpostsback_tri', methods: ['GET'])]
    public function tri(Request $request, ForumpostRepository $forumpostRepository, PaginatorInterface $paginator): Response
    {
        $order = $request->query->get('order', 'asc');
        $field = $request->query->get('field', 'title');

        if (!in_array(strtolower($order), ['asc', 'desc'])) {
            $order = 'asc';
        }

        if (!in_array($field, ['title'])) {
            $field = 'title';
        }

        $queryBuilder = $forumpostRepository->createQueryBuilder('a')
            ->orderBy('a.' . $field, $order);

        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('forumpost/index.html.twig', [
            'pagination' => $pagination,

        ]);
    }



}
