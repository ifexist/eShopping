<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;
use Eshop\ShopBundle\Entity\Category;
use Eshop\ShopBundle\Entity\Manufacturer;
use Eshop\UserBundle\Entity\User;

/**
 * ProductcatfrRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductcatfrRepository extends EntityRepository
{
    public function getTotal()
    {
        $qb = $this->createQueryBuilder('pcen')
                   ->select('COUNT(pcen)');     // On sélectionne simplement COUNT(cu)

        return (int) $qb->getQuery()
                         ->getSingleScalarResult(); // Utilisation de getSingleScalarResult pour avoir directement le résultat du COUNT
    } 

    public function getProductcatDistinct() 
    {
        $qb = $this->createQueryBuilder('gp')
                ->select('DISTINCT gp.cat1')
                ->where('gp.enable = :enable')
                ->setParameter('enable', 1)
                ->orderBy('gp.cat1', 'ASC')
                ->getQuery();

        return $qb;
    }  
}
