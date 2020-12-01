<?php

namespace AppBundle\Helper;


use AppBundle\Entity\Product;
use AppBundle\Helper\BaseHelper;

class AjaxHelper extends BaseHelper
{
    public function genProducts()
    {
        $product = $this->container->get('app.product_helper');
        return $product->genProducts();
    }
    public function paging($page)
    {
         $products = $this->entityManager->getRepository(Product::class)
            ->findByLimitAndPage(Product::PRODUCT_PER_PAGE, $page);
         return array('html' => $this->renderProducts($products));
    }

    public function renderProducts($products){
        $html = '';
        for ($i = 0; $i < count($products); $i++){
            $html .= '
                <div class="row alert alert-success margin__tb__8">
                    <div class="col-1">
                        ' . $products[$i]->getId() . '
                    </div>
                    <div class="col-2">
                        <img src="' . $products[$i]->getImage() . '" style="max-width: 100%">
                    </div>
                    <div class="col-2">
                        ' . $products[$i]->getName() . '
                    </div>
                    <div class="col-3">
                        ' . $products[$i]->getDescription() . '
                    </div>
                    <div class="col-2">
                        ' . $products[$i]->getBrand() . '
                    </div>
                    <div class="col-2">
                        ' . $products[$i]->getPrice() . '
                    </div>
                </div>';
        }
        return $html;
    }
}
