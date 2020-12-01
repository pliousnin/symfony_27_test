<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $count_product = $entityManager->getRepository(Product::class)->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $pages = ($count_product - ($count_product % Product::PRODUCT_PER_PAGE)) / Product::PRODUCT_PER_PAGE;
        $pages++;


        $products = $entityManager->getRepository(Product::class)
            ->findByLimitAndPage(Product::PRODUCT_PER_PAGE);

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
            'pages' => $pages,
        ));
    }
}
