<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePassword;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/back',name:'back_admin')]
    public function index1(UserRepository $userRepository):Response

    {
        return $this->render('base.html.twig', [
        ]);
    }
    #[Route('/front',name:'homepage')]
    public function index2(UserRepository $userRepository):Response

    {
        return $this->render('home.html.twig', [
        ]);
    }
    #[Route('/frontpage',name:'frontpage')]
    public function index3(UserRepository $userRepository):Response

    {
        return $this->render('front.html.twig', [
        ]);
    }
    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager,UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'registrationForm' => $form,
        ]);
    }
    #[Route('/{id}/password', name: 'change_password', methods: ['GET', 'POST'])]
    public function password(Request $request, User $user, EntityManagerInterface $entityManager,UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $form = $this->createForm(ChangePassword::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                ));

            $entityManager->flush();

            return $this->redirectToRoute('homepage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/changepwd.html.twig', [
            'user' => $user,
            'registrationForm' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/ban/{id}', name: 'app_user_toggle_ban')]
    public function toggleBan(User $user, MailerInterface $mailer,EntityManagerInterface $entityManager): Response
    {

        if($user->isStatus()==0)
        {

            $email = (new Email())
                ->from('ahmedjebari022@gmail.com')
                ->to($user->getEmail())
                ->subject('Ban')
                ->html($this->renderView('user/email.html.twig'
                // pass any variables to your template
                ));
            $mailer->send($email);


        }


        $user->setStatus(!$user->isStatus());

        $entityManager->flush();

        // Redirect back to user details page or any other appropriate page
        return $this->redirectToRoute('app_user_index', ['id' => $user->getId()]);
    }
}
