<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class AjaxController extends Controller
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function indexAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirect('/');
        }
        $action = $request->get('action');

        $product = $this->container->get('product.helper');
        return new JsonResponse($product->dosomething());
    }


}
