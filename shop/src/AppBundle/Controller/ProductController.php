<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function indexAction(Request $request, $id = 0)
    {
        // replace this example code with whatever you need
        if ($id === 0) $id++;
        return $this->render('product/index.html.twig', [
            'id' => $id
        ]);
    }
}
