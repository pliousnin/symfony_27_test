<?php

namespace AppBundle\Helper;

abstract class BaseHelper
{
    protected $entityManager;
    protected $container;
    protected $request;


    public function __construct($em, $container)
    {
        $this->entityManager = $em;
        $this->container = $container;
    }
}