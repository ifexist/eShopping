<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Eshop\ShopBundle\Entity\Category;
use Eshop\ShopBundle\Entity\Manufacturer;
use Eshop\UserBundle\Entity\User;

/**
 * GProductcat1deRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GProductcat1deRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('gpc1de')
                   ->select('COUNT(gpcde)');     // On sélectionne simplement COUNT(cu)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 

    
}
