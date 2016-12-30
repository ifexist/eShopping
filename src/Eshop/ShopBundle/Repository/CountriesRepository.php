<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CountriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CountriesRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('ct')
                   ->select('COUNT(ct)');     // On sélectionne simplement COUNT(cu)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 
}