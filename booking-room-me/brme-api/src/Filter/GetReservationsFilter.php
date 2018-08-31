<?php


namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;
use Psr\Log\LoggerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

final class GetReservationsFilter extends AbstractContextAwareFilter
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
        if ( $property != 'time') {
            return;
        }
        date_default_timezone_set('Europe/Paris');
        if ($value == 'now') {
            $curentDate = new \DateTime();
            $lastMonday = new \DateTime();
            $nextMonday = new \DateTime();

        } else {
            $curentDate = new \DateTime();
            $lastMonday = new \DateTime();
            $nextMonday = new \DateTime();
            $curentDate->setTimestamp($value);
            $lastMonday->setTimestamp($value);
            $nextMonday->setTimestamp($value);
        }

        $lastMonday->modify("last monday");
        if ($curentDate->format('N') == 1) {
            $lastMonday->modify("next monday");
        }
        $nextMonday->modify("next monday");




        $this->logger->info('asked date : '. $curentDate->format('j/n/Y G:i'));
        $this->logger->info('lastMonday date : '. $lastMonday->getTimestamp());
        $this->logger->info('nextMonday date : '. $nextMonday->getTimestamp());

        $queryBuilder
            ->andWhere('o.startTime >= ?1')
            ->andWhere('o.startTime < ?2')
            ->setParameter(1, $lastMonday->getTimestamp())
            ->setParameter(2, $nextMonday->getTimestamp());
    }

    // This function is only used to hook in documentation generators (supported by Swagger and Hydra)
    public function getDescription(string $resourceClass): array
    {
        if (!$this->properties) {
            return [];
        }

        $description = [];

        $description["time"] = [
            'property' => 'time',
            'type' => 'string',
            'required' => false,
            'swagger' => [
                'description' => 'Return all the reservations of the week around the timestamp given',
                'name' => 'Weekly time filter on Reservation',
                'type' => 'Filter',
            ],
        ];


        return $description;
    }
}