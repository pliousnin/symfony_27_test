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
    private $html = '';
    private $debug = true;
    private $max_product = 12;

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

        $this->findProducts();
        $this->renderWindow();
    }

    public function findProducts(){
        $this->q_result = $this->entityManager->getRepository(Search::class)
            ->findByJsonLike($this->q);
        for ($i = 0; $i < count($this->q_array); $i++){
            $this->q_array_result = array_merge($this->q_array_result, $this->entityManager->getRepository(Search::class)
                ->findByJsonLike($this->q_array[$i]));
        }
    }

    public function renderResults($result = 'q_result'){
        for ($i = 0; $i < min(count($this->$result), $this->max_product); $i++){
            $this->html .= '
                <div class="row">
                    <div class="col-2">
                        <img src="' . $this->$result[$i]->getImage() . '" style="max-height: 50px;">
                    </div>
                    <div class="col-10">
                        ' . json_decode($this->$result[$i]->getJson())->name . '
                    </div>
                </div>
            ';
        }
        $this->max_product -= min(count($this->$result), $this->max_product);

    }
    public function renderWindow(){
        $this->html .= '
            <div class="search__result">
        ';
        $this->renderResults();
        $this->renderResults('q_array_result');
        $this->html .= '
            </div>
            <style>
                .search__product{
                    position: relative;
                }
                .search__result{   
                    position: absolute;
                    min-height: 250px;
                    background-color: white;
                    width: 450px;
                    border-style: outset;
                    border-width: 2px;
                }
            </style>
        ';
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
