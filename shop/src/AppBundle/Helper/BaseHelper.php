<?php

namespace AppBundle\Helper;

abstract class BaseHelper
{
    private $entityManager;
//    private $container;


//    public function __construct(ObjectManager $em, $container)
    public function __construct($em)
    {
        $this->entityManager = $em;
//        $this->container = $container;
    }
    public function __destruct()
    {
//        $this->entityManager->flush();
    }
}