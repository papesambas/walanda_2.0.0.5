<?php

namespace App\Controller;

use App\Entity\Users;
use App\Service\JWTService;
use App\Service\SendMailService;
use App\Form\RegistrationFormType;
use App\Repository\UsersRepository;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        UserAuthenticatorInterface $userAuthenticator,
        UsersAuthenticator $authenticator,
        EntityManagerInterface $entityManager,
        SendMailService $mail,
        JWTService $jwt
    ): Response {
        $user = new Users();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            //On génère le JWT de l'utilisateur
            //On crée le header
            $header = [
                'typ' => 'JWT',
                'alg' => 'HS256'
            ];

            //On crée le payload
            $payload = [
                'user_id' => $user->getId()

            ];

            //On génère le token
            $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));



            // On envoi le mail
            $mail->send(
                'no-reply@empt.edu',
                $user->getEmail(),
                "Activation de votre compte sur le site de l'école Mamadou TRAORE",
                'register',
                [
                    'user' => $user,
                    'token' => $token
                ]
            );

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verif/{token}', name: 'app_verify_user')]
    public function verifyUser(
        $token,
        JWTService $jwt,
        UsersRepository $usersRepository,
        EntityManagerInterface $em
    ): Response {
        //On vérifie si le token est valide, n'a pas expiré et n'a pas été modifié
        if (
            $jwt->isValid($token) && !$jwt->isExpired($token) &&
            $jwt->check($token, $this->getParameter('app.jwtsecret'))
        ) {

            //On récupère le payload
            $payload = $jwt->getPayload($token);
            $searchuser = $payload['user_id'];
            //On récupère le User du token
            $user = $usersRepository->find(['id' => $searchuser]);

            //On vérifie que l'utilisateur existe et n'a pas encore activé son compte
            if ($user && !$user->isIsVerified()) {
                $user->setIsVerified(true);
                $em->persist($user);
                $em->flush();
                //$usersRepository->save($user, true);
                $this->addFlash('success', 'Utilisateur activé');
                return $this->redirectToRoute('app_blog');
            }
        }

        //Ici un problème se pose dans le token
        $this->addFlash('danger', 'Le token est invalide ou a expiré');
        return $this->redirectToRoute('app_login');
    }

    #[Route('/renvoiVerif', name: 'app_resend_verify')]
    public function resendVerif(JWTService $jwt, SendMailService $mail, UsersRepository $usersRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('danger', "Vous devez Ãªtre connecté pour accéder Ã  cette page");
            return $this->redirectToRoute('app_login');
        }

        if ($user->isIsVerified()) {
            $this->addFlash('warning', "Cet Utilisateur est déjÃ  activé");
            return $this->redirectToRoute('app_login');
        }

        //On génère le JWT de l'utilisateur
        //On crée le header
        $header = [
            'typ' => 'JWT',
            'alg' => 'HS256'
        ];

        //On crée le payload
        $payload = [
            'user_id' => $user->getId()

        ];

        //On génère le token
        $token = $jwt->generate($header, $payload, $this->getParameter('app.jwtsecret'));

        //On envoi un mail
        $mail->send(
            'empt@gmail.com',
            $user->getEmail(),
            "Activation de votre compte sur le site de l'école Mamadou TRAORE",
            'register',
            [
                'user' => $user,
                'token' => $token,
            ]
        );
        $this->addFlash('success', 'Email de vérification envoyé');
        return $this->redirectToRoute('app_home');
    }
}