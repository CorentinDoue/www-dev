<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EncodeUser
{
    private $encoder;
    private $mailer;
    private $twig;

    public function __construct(UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->encoder = $encoder;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function __invoke(User $data): User
    {
        return $this->preprocess($data, $this->encoder);
    }

    protected function preprocess(User $data, UserPasswordEncoderInterface $encoder): User
    {
        $password = $this->randomPassword();

        $encoded = $encoder->encodePassword($data, $password);
        $data->setPassword($encoded);

        $role = $data->getRole();
        switch ($role){
            case "ROLE_ADMIN":
                $data->setRole("ROLE_ADMIN");
                break;
            case "ROLE_ASSO":
                $data->setRole("ROLE_ASSO");
                break;
            default:
                $data->setRole(null);
        }

        try {
            $message = (new \Swift_Message('Ouverture de votre compte de réservation des salles à la Me'))
                ->setFrom('no-reply-me@example.com')
                ->setTo('recipient@example.com')
                ->setBody($this->twig->render('createUser.html.twig',
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

    function randomPassword() {
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