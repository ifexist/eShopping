<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * InfoscompanyRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InfoscompanyRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('ie')
                   ->select('COUNT(ie)');     // On sélectionne simplement COUNT(m)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 
}