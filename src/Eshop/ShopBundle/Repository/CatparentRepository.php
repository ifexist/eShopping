<?php

namespace Eshop\ShopBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * CatparentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CatparentRepository extends EntityRepository
{
    /**
     * @param bool $showEmpty
     * @param string $order
     * @param string $sort
     * @return array
     */
    public function getAllCatparents()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('cp')
            ->from('ShopBundle:Catparent', 'cp');


        $qb->orderBy('cp.name');

        return $qb->getQuery()->getResult();
    }

    /**
     * query for admin paginator
     *
     * @return QueryBuilder
     */
    public function getAllCatparentsAdminQB()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('c')
            ->from('ShopBundle:Catparent', 'cp');

        return $qb;
    }
}
