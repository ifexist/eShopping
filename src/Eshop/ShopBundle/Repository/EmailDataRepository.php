<?php

namespace Eshop\ShopBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * EmailDataRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmailDataRepository extends EntityRepository
{

    /**
     * query for admin paginator
     *
     * @return QueryBuilder
     */
    public function getAllEmailDatasAdminQB()
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('edt')
            ->from('ShopBundle:EmailData', 'edt');

        return $qb;
    }
}
