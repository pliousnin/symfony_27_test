<?php
// src/AppBundle/Repository/SearchRepository.php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }

    public function findFirst()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p'
            )
            ->setMaxResults(1)
            ->getResult();
    }

    public function findByLimitAndPage($limit, $page = 1)
    {
        $offset = $limit * ($page - 1);
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Product p'
            )
            ->setFirstResult( $offset )
            ->setMaxResults( $limit )
            ->getResult();
    }

    public function findByIds(array $ids)
    {
        $repo = $this->getEntityManager()
            ->getRepository("AppBundle:Product")
            ->createQueryBuilder('p');
        for ($i = 0; $i < count($ids); $i++){
            $index = 'q' . $i;
            if ($i === 0){
                $repo->where('p.id = :' . $index)->setParameter($index, $ids[$i]);
            }else{
                $repo->orWhere('p.id = :' . $index)->setParameter($index, $ids[$i]);
            }
        }

        return $repo->getQuery()->getResult();
    }
}
