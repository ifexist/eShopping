<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TagCategoriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagCategoriesRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('txc')
                   ->select('COUNT(txc)');

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 
}