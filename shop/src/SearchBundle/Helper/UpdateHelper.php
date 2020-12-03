<?php

namespace SearchBundle\Helper;

use AppBundle\Entity\Product;
use AppBundle\Helper\BaseHelper;
use SearchBundle\Entity\Search;

class UpdateHelper extends BaseHelper
{
    public function fillSearchEntity(){
        $this->deleteSearch();
        $products = $this->entityManager->getRepository(Product::class)
            ->findAll();
        for ($i = 0; $i < count($products); $i++){
            $this->fillOne($products[$i]);
        }
        return json_encode(array('test' => 'done'));
    }
    public function fillOne($product){
        $product_property = [];
        $searchIndex = new Search();
        $searchIndex->setPid($product->getId());
        $product_property['name'] = $product->getName();
        $product_property['description'] = $product->getDescription();
        $product_property['brand'] = $product->getBrand();

        $searchIndex->setJson(json_encode($product_property));
        $searchIndex->setImage($product->getImage());

        $this->entityManager->persist($searchIndex);
        $this->entityManager->flush();
    }

    public function deleteSearch(){
        $sql = 'DELETE FROM search;';
        $connection = $this->entityManager->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
