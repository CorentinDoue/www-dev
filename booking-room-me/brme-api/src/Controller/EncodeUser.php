<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EncodeUser
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function __invoke(User $data): User
    {
        return $this->preprocess($data, $this->encoder);
    }

    protected function preprocess(User $data, UserPasswordEncoderInterface $encoder): User
    {
        $encoded = $encoder->encodePassword($data, $data->getPassword());
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
        return $data;
    }
}