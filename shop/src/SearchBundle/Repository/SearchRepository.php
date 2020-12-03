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
                'SELECT p FROM SearchBundle:Search p ORDER BY p.name ASC'
            )
            ->getResult();
    }
    public function findByJsonLike($q)
    {
        return $this->getEntityManager()
            ->getRepository("SearchBundle:Search")
            ->createQueryBuilder('s')
            ->where('s.json like :q')
            ->setParameter('q', '%' . $q . '%')
            ->getQuery()
            ->getResult();
    }

}
