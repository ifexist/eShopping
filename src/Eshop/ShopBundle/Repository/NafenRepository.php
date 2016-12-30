<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * NafenRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NafenRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('nfen')
                   ->select('COUNT(nfen)');     // On sélectionne simplement COUNT(cu)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 
}
