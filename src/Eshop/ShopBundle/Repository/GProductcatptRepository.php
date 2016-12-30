<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Eshop\ShopBundle\Entity\Category;
use Eshop\ShopBundle\Entity\Manufacturer;
use Eshop\UserBundle\Entity\User;

/**
 * GProductcatptRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GProductcatptRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('gpcpt')
                   ->select('COUNT(gpcpt)');     // On sélectionne simplement COUNT(cu)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 

    
}
