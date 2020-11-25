<?php
// src/AppBundle/Controller/ImpressumController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ImpressumController extends Controller
{
    /**
     * @Route("/impressum")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('impressum/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }
}