<?php

namespace App\Controller;

use App\Entity\Forumpost;
use App\Form\ForumpostType;
use App\Repository\ForumpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AppController extends AbstractController
{

    #[Route('/', name: 'main')]
    public function main(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
    #[Route('/forumpost2', name: 'forumpost', methods: ['GET'])]
    public function forumpost(ForumpostRepository $forumpostRepository): Response
    {
        return $this->render('app/forumpost.html.twig', [
            'forumposts' => $forumpostRepository->findAll(),
        ]);
    }






}