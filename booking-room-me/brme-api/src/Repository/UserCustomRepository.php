<?php
namespace App\Repository;

use App\Entity\User;
use App\DTO\UserNameDTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserCustomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllPartial(): array
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT NEW App\DTO\UserNameDTO(u.id, u.lastname, u.surname) FROM App\Entity\User u');

        return $query->getResult();
    }
}



