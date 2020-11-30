<?php

namespace AppBundle\Helper;

abstract class BaseHelper
{
    protected $entityManager;
//    private $container;


//    public function __construct(ObjectManager $em, $container)
    public function __construct($em)
    {
        $this->entityManager = $em;
//        $this->container = $container;
    }
}