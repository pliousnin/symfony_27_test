<?php

namespace SearchBundle\Helper;

use SearchBundle\Entity\Search;
use SearchBundle\Helper\BaseHelper;

class SearchHelper extends BaseHelper
{
    private $q;
    private $q_result = [];
    private $q_array;
    private $q_array_result = [];
    private $response = [];
    private $html;
    private $debug = true;

    public function searchProducts($q) :array
    {
        $this->setQ($q);
        $this->init();
        $this->collectResponse();
        return $this->response;
    }

    public function setQ($q)
    {
        $this->q = trim(preg_replace('/\s+/', ' ',$q));
        $this->q_array = array_unique(explode(' ', $this->q));
    }

    public function init()
    {
        $this->html = 'hallo';
        $this->findProducts();
    }

    public function findProducts(){
        $this->q_result = $this->entityManager->getRepository(Search::class)
            ->findByJsonLike($this->q);
        for ($i = 0; $i < count($this->q_array); $i++){
            $this->q_array_result[$this->q_array[$i]] = $this->entityManager->getRepository(Search::class)
                ->findByJsonLike($this->q_array[$i]);
        }
    }

    public function collectResponse()
    {
        $this->response['html'] = $this->html;
        if ($this->debug){
            $this->response['q'] = $this->q;
            $this->response['q_array'] = $this->q_array;
            $this->response['q_result'] = $this->q_result;
            $this->response['q_array_result'] = $this->q_array_result;
        }
    }

    public function debug()
    {
        $this->debug = true;
        $this->collectResponse();
        var_dump($this->response);
    }

}
