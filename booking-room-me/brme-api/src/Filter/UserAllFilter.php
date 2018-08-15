<?php


namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;
use Psr\Log\LoggerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

final class UserAllFilter extends AbstractContextAwareFilter
{
    /**
     * UserAllFilter constructor.
     */
    public function __construct(LoggerInterface $logger, ManagerRegistry $managerRegistery)
    {
        parent::__construct($managerRegistery);
        $this->logger = $logger;
    }

    protected function filterProperty(string $property, $value, QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {

        if ( $property != 'search' ) {
            return;
        }

        $this->logger->info('UserAllFilter value : '. $value);

        $queryBuilder
            ->orWhere('o.email LIKE ?1')
            ->orWhere('o.lastname LIKE ?1')
            ->orWhere('o.firstname LIKE ?1')
            ->orWhere('o.bedRoomNumber LIKE ?1')
            ->orWhere('o.type LIKE ?1')
            ->orWhere('o.role LIKE ?1')
            ->setParameter(1, '%'.$value.'%');
    }

    // This function is only used to hook in documentation generators (supported by Swagger and Hydra)
    public function getDescription(string $resourceClass): array
    {
        if (!$this->properties) {
            return [];
        }

        $description = [];

        $description["search"] = [
            'property' => 'email, Lastname, Firstname, BedRoomNumber, Type or Role',
            'type' => 'string',
            'required' => false,
            'swagger' => [
                'description' => 'Filter on email, Lastname, Firstname, BedRoomNumber, Type or Role in a single request',
                'name' => 'Search User',
                'type' => 'Filter',
            ],
        ];


        return $description;
    }
}