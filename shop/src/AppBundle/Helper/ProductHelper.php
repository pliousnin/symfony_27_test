<?php

namespace AppBundle\Helper;

use AppBundle\Entity\Product;
use AppBundle\Helper\BaseHelper;

class ProductHelper extends BaseHelper
{

    public function genProducts()
    {
        for ($i=0; $i<100; $i++){
            $this->genProduct();
        }
        $this->entityManager->flush();
        return array('success' => 'true');
    }
    public function genProduct()
    {
        $product = new Product();
        $product->setBrand($this->getRandomBrand());
        $product->setName($this->getRandomName());
        $product->setDescription($this->getRandomDescription());
        $product->setImage($this->getRandomImage());
        $product->setPrice($this->getRandomPrice());
        $this->entityManager->persist($product);
    }
    public function getRandomBrand(){
        $brand = array();
        $brand[] = 'addidas';
        $brand[] = 'nike';
        $brand[] = 'converse';
        $brand[] = 'puma';
        $brand[] = 'A.P.C.';
        $brand[] = 'A|X Armani Exchange';
        $brand[] = 'Acne Studios';
        $brand[] = 'Aglini';
        $brand[] = 'Akris';
        return $brand[random_int(0, 8)];

    }

    public function getRandomName(){
        $name = array();
        $name[] = 'hose';
        $name[] = 'jacke';
        $name[] = 'stuhl';
        $name[] = 'hemd';
        $name[] = 't-shirt';
        $name[] = 'pullover';
        $name[] = 'pullunder';
        $name[] = 'schuhe';
        $name[] = 'Mütze';
        return $name[random_int(0, 8)];

    }

    private function getRandomDescription()
    {
        $description = array();
        $description[] = 'Gutes Produkt';
        $description[] = 'Beste Produkt';
        $description[] = 'Aller beste Produkt';
        $description[] = 'Wichtige Beschreibung';
        $description[] = 'I dont know';
        $description[] = 'andere Beschreibung';
        $description[] = 'Lorem';
        $description[] = 'Kann man tragen';
        $description[] = 'Kann sich sehen lassen';
        return $description[random_int(0, 8)];
    }

    public function getRandomPrice(){
        $price = array();
        $price[] = 9.99;
        $price[] = 19.99;
        $price[] = 39.99;
        $price[] = 49.99;
        $price[] = 5.00;
        $price[] = 59.99;
        $price[] = 99.90;
        $price[] = 159.00;
        $price[] = 250.00;
        return $price[random_int(0, 8)];

    }

    public function getRandomImage(){
        $image = '/Images/best_product.jpg';
        return $image;

    }
}