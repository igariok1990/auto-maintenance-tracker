<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 19/07/17
 * Time: 9:38 PM
 */

namespace Core\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\Specification\SqlSpecificationInterface;

class AbstractRepository extends EntityRepository
{
    public function findFromSpecification(SqlSpecificationInterface $specification)
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $specification->specify($query);
        $result = $query->getQuery()->getResult();
        return $result;
    }

    public function findOneFromSpecification(SqlSpecificationInterface $specification)
    {
        $query = $this->getEntityManager()->createQueryBuilder();
        $specification->specify($query);
        $result = $query->getQuery()->getOneOrNullResult();
        return $result;
    }
}
