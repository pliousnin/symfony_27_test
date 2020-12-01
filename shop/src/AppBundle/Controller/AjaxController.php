<?php
namespace AppBundle\Controller;

#include_once '../src/AppBundle/Helper/ProductHelper.php';
#use AppBundle\Helper\ProductHelper;

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
        $ajax = $this->container->get('app.ajax_helper');

        switch ($action) {
            case 'gen__100':
                $response = $ajax->genProducts();
                break;
            case 'paging':
                $response = $ajax->paging($request->get('page'));
                break;
            default:
                $response = array('error' => 'No action');
        }


        return new JsonResponse($response);
    }


}
