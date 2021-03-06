<?php

namespace SearchBundle\Helper;

abstract class BaseHelper
{
    protected $entityManager;
    protected $container;

    public function __construct($em, $container)
    {
        $this->entityManager = $em;
        $this->container = $container;
    }
}