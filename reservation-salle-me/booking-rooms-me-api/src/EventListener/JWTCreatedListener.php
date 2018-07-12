<?php
/**
 * Created by PhpStorm.
 * User: corentin
 * Date: 12/07/18
 * Time: 01:10
 */

namespace App\EventListener;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTCreatedListener
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $request = $this->requestStack->getCurrentRequest();


        $data = json_decode($request->getContent(), true);
        $payload = $event->getData();

        if ($data['remember'])
        {
            $expiration = new \DateTime('+1 year');
        }else{
            $expiration = new \DateTime('+1 day');
        }
        $expiration->setTime(2, 0, 0);


        $payload['exp'] = $expiration->getTimestamp();
        $payload['remember'] = $data['remember'];

        $event->setData($payload);
    }
}