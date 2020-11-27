<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use http\Env\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BackendController extends Controller
{
    /**
     * @Route("/backend", name="backend")
     */
    public function indexAction(Request $request)
    {
        $product = new Product;
        $entityManager = $this->getDoctrine()->getManager();
        $products = $entityManager->getRepository(Product::class)
            ->findAll();

        $productType = new ProductType;
        $form = $this->createForm($productType, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$product` variable has also been updated
            $product = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('backend');
        }

        return $this->render('backend/index.html.twig', array(
            #'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
            'products' => $products,
        ));
    }
    /**
     * @Route("/backendajax", name="backendajax")
     */
    public function ajaxResponse(Request $request){
        #var_dump('test');die();
        return new \Symfony\Component\HttpFoundation\Response('hallo');
        return new JsonResponse(array(
            'test' => 'hallo',
        ));
    }

    /**
     * @Route("/backend2", name="backend2")
     */
    public function index2Action(Request $request)
    {
        $product = new Product();

        $form = $this->createFormBuilder($product)
            ->add('name', 'text')
            ->add('price', 'money')
            ->add('description', 'text')
            ->add('brand', 'text')
            ->add('save', 'submit', array('label' => 'Produkt anlegen'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$product` variable has also been updated
            $product = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            #$entityManager = $this->getDoctrine()->getManager();
            #$entityManager->persist($product);
            // $entityManager->flush();

            return $this->redirectToRoute('backend');
        }

        return $this->render('backend/index.html.twig', array(
            #'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
        ));
    }
}
