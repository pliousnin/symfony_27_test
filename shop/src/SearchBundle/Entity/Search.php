<?php
// src/SearchBundle/Entity/Search.php
namespace SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="SearchBundle\Repository\SearchRepository")
 * @ORM\Table(name="search")
 */

class Search
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="text")
     */
    private $json;

    /**
     * @ORM\Column(type="text")
     */
    private $image;
}