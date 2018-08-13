<?php
namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;


class AuthenticationSuccessListener
{
    private $jwtEncoder;
    // lexik_jwt_authentication.encoder.lcobucci

    public function __construct(JWTEncoderInterface $jwtEncoder)
    {
        $this->jwtEncoder = $jwtEncoder;
    }
    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof User) {
            return;
        }

        try {
            $jwt = $this->jwtEncoder->decode($data['token']);
            $exp = $jwt['exp'];
            $exp = new \DateTime("@$exp");
            $exp->setTime(1, 0, 0);

        } catch (JWTDecodeFailureException $e) {
            $exp = new \DateTime('+1 day');
            $exp->setTime(1, 0, 0);
        }



        $data['id'] = $user->getId();

        $data['email'] = $user->getEmail();

        $data['firstname'] = $user->getFirstname();

        $data['lastname'] = $user->getLastname();

        $data['role'] = $user->getRole();

        $data['type'] = $user->getType();

        $data['bedroomnumber'] = $user->getBedRoomNumber();

        $data['exp'] = $exp->getTimestamp();

        $event->setData($data);
    }
}