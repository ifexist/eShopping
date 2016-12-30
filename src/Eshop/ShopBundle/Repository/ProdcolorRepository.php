<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ProdcolorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProdcolorRepository extends EntityRepository
{
    /**
     * @param bool $showEmpty
     * @param string $order
     * @param string $sort
     * @return array
     */
    public function getAllProdcolors()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('prc')
            ->from('ShopBundle:Prodcolor', 'prc');


        $qb->orderBy('prc.title');

        return $qb->getQuery()->getResult();
    }

    /**
     * query for admin paginator
     *
     * @return QueryBuilder
     */
    public function getAllProdcolorsAdminQB()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('c')
            ->from('ShopBundle:Prodcolor', 'prc');

        return $qb;
    }
}