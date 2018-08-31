<?php

namespace App\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Repository\UserCustomRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class UpdatePwdSubscriber implements EventSubscriberInterface
{
    private $userManager;
    private $encoder;
    private $mailer;
    private $twig;
    private $logger;

    public function __construct(UserPasswordEncoderInterface $encoder,
                                \Swift_Mailer $mailer,
                                \Twig_Environment $twig,
                                UserCustomRepository  $userManager, LoggerInterface $logger)
    {
        $this->encoder = $encoder;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->userManager = $userManager;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['updatePassword', EventPriorities::PRE_WRITE],
        ];
    }

    public function updatePassword(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();

        //$this->logger->info(var_export($request->attributes));
        //$this->logger->info(var_export($request->request));


        if ('api_users_updatePwd_item' !== $request->attributes->get('_route')) {
            return;
        }


        $user = $event->getControllerResult();

        $this->logger->info($user->getPassword());

        $data = json_decode($request->getContent(), true);

        $formerPwd = $data['formerPwd'];

        $this->logger->info($formerPwd);

        if (!$this->encoder->isPasswordValid($user, $formerPwd)) {
            throw new HttpException(401, 'Mot de passe actuel non valide');
        }

        $newPwd = $data['newPwd'];

        $this->logger->info($newPwd);

        $encoded =$this->encoder->encodePassword($user, $newPwd);

        $user->setPassword($encoded);




        $this->userManager->persist($user);

        $event->setResponse(new JsonResponse(null, 204));
    }
}