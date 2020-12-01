<?php
// src/AppBundle/Controller/SearchController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    /**
     * @Route("/search")
     */
    public function indexAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirect('/');
        }

        $search = $this->container->get('app.search_helper');
        $q = $request->get('q');

        $response = $search->searchProducts($q);

        return new JsonResponse($response);
    }
}