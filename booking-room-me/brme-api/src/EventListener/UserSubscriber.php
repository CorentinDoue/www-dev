<?php

namespace App\EventListener;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Repository\UserCustomRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class UserSubscriber implements EventSubscriberInterface
{
    private $userManager;
    private $encoder;
    private $mailer;
    private $twig;

    public function __construct(UserPasswordEncoderInterface $encoder,
                                \Swift_Mailer $mailer,
                                \Twig_Environment $twig,
                                UserCustomRepository  $userManager)
    {
        $this->encoder = $encoder;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->userManager = $userManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendPasswordReset', EventPriorities::POST_VALIDATE],
        ];
    }

    public function sendPasswordReset(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();


        if ('api_forgot_password_requests_post_collection' !== $request->attributes->get('_route')) {
            return;
        }

        $forgotPasswordRequest = $event->getControllerResult();

        $user = $this->userManager->findOneBy(["email"=>$forgotPasswordRequest->email]);

        // We do nothing if the user does not exist in the database
        if ($user) {
            $user = $this->resetPwd($user, $this->encoder);
        } else {
            throw new HttpException(400,"Pas de compte associé à cet email");
        }

        $this->userManager->persist($user);

        $event->setResponse(new JsonResponse(null, 204));
    }

    protected function resetPwd(User $data, UserPasswordEncoderInterface $encoder): User
    {
        try {
            $password = $this->randomPassword();
        } catch (\Exception $e) {
            throw new HttpException(500);
        }
        $encoded = $encoder->encodePassword($data, $password);
        $data->setPassword($encoded);


        try {
            $message = (new \Swift_Message('Réinitialisation de votre mot de passe'))
                ->setFrom('no-reply-me@example.com')
                ->setTo('recipient@example.com')
                ->setBody($this->twig->render('resetPwd.html.twig',
                    array('name' => $data->getFirstname().' '.$data->getLastname(), 'password' => $password))
                    , 'text/html');
        } catch (\Twig_Error_Loader $e) {
            throw new HttpException(500);
        } catch (\Twig_Error_Runtime $e) {
            throw new HttpException(500);
        } catch (\Twig_Error_Syntax $e) {
            throw new HttpException(500);
        }

        $this->mailer->send($message);

        return $data;
    }

    protected  function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}