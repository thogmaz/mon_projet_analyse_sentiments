<?php

namespace App\Security;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    private $verifyEmailHelper;
    private $mailer;
    private $requestStack;

    public function __construct(VerifyEmailHelperInterface $verifyEmailHelper, MailerInterface $mailer, RequestStack $requestStack)
    {
        $this->verifyEmailHelper = $verifyEmailHelper;
        $this->mailer = $mailer;
        $this->requestStack = $requestStack;
    }

//    public function sendEmailConfirmation(string $verifyEmailRouteName, UserInterface $user, TemplatedEmail $email): void
//    {
//        $signatureComponents = $this->verifyEmailHelper->generateSignature(
//            $verifyEmailRouteName,
//            $user->getId(),
//            $user->getEmail(),
//            ['id' => $user->getId()] // passer 'id' comme paramètre à votre route
//        );

//        $context = $email->getContext();
//        $context['signedUrl'] = $signatureComponents->getSignedUrl();
//        $context['expiresAtMessage'] = $signatureComponents->getExpirationMessage();

//        $email->context($context);

//        $this->mailer->send($email);
//    }
}
