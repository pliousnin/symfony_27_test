<?php
// src/SearchBundle/Repository/SearchRepository.php
namespace SearchBundle\Repository;

use Doctrine\ORM\EntityRepository;

class SearchRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }

}
