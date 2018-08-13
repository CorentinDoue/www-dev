<?php
/**
 * Created by PhpStorm.
 * User: douec
 * Date: 12/08/2018
 * Time: 13:53
 */

namespace App\EventListener;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

class AuthenticationFailureListener
{

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {
        $data = [
            'status'  => '401 Bad Credential',
            'message' => 'Email et/ou mot de passe incorrect.',
        ];

        $response = new JWTAuthenticationFailureResponse($data);

        $event->setResponse($response);
    }
}