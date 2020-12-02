<?php
// src/SearchBundle/Controller/SearchController.php
namespace SearchBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{

    public function searchAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirect('/');
        }

        $search = $this->container->get('search.search_helper');
        $q = $request->get('q');

        $response = $search->searchProducts($q);

        return new JsonResponse($response);
    }
}