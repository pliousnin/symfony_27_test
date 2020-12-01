<?php

namespace AppBundle\Helper;

use AppBundle\Entity\Product;
use AppBundle\Helper\BaseHelper;

class SearchHelper extends BaseHelper
{
    private $q;
    private $response = [];
    private $html;
    private $debug = true;

    public function searchProducts($q){
        $this->setQ($q);
        $this->init();
        $this->collectResponse();
        return $this->response;
    }

    public function setQ($q){
        $this->q = $q;
    }

    public function init(){
        $this->html = 'hallo';
    }

    public function collectResponse(){
        $this->response['html'] = $this->html;
        if ($this->debug){
            $this->response['q'] = $this->q;
        }
    }

}
