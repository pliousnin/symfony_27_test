<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ImpressumController extends Controller
{
    /**
     * @Route("/impressum")
     */
    public function indexAction(Request $request)
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number7: '.$number.'</body></html>'
        );
    }
}