<?php

namespace SearchBundle\Helper;

use AppBundle\Entity\Product;
use AppBundle\Helper\BaseHelper;

class SearchHelper extends BaseHelper
{
    private $q;
    private $q_array;
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
        $this->q = preg_replace('/\s+/', ' ',$q);
        $this->q_array = array_unique(explode(' ', $this->q));
    }

    public function init(){
        $this->html = 'hallo';
    }

    public function collectResponse(){
        $this->response['html'] = $this->html;
        if ($this->debug){
            $this->response['q'] = $this->q;
            $this->response['q_array'] = $this->q_array;
        }
    }

}
