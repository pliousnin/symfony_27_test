<?php
// src/SearchBundle/Controller/UpdateController.php
namespace SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateController extends Controller
{

    public function updateAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirect('/');
        }
var_dump('test');die();
        $update = $this->container->get('search.update_helper');

        $response = $update->createSearchEntity();

        return new JsonResponse($response);
    }
}