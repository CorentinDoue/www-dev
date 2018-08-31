<?php
namespace App\Repository;

use App\Entity\User;
use App\DTO\UserNameDTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserCustomRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findAllPartial(): array
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT NEW App\DTO\UserNameDTO(u.id, u.lastname, u.firstname) FROM App\Entity\User u');

        return $query->getResult();
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return parent::findOneBy($criteria, $orderBy);
    }

    public function persist($user){
        try {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
        } catch (ORMException $e) {
            throw new HttpException(500);
        }
    }

    public function getPwd(User $user){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u.password')
            ->from('App\Entity\User', 'u')
            ->where('u.id = ?1')
            ->setParameter(1, $user->getId());
        try {
            return $qb->getQuery()->getSingleResult();
        } catch (NoResultException $e) {
            throw new HttpException(500);
        } catch (NonUniqueResultException $e) {
            throw new HttpException(500);
        }
    }
}



