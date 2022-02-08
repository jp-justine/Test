<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/", name="Product_")
*/
class ProductController extends AbstractController 
{

     /**
     * @Route("/", name="index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()
             ->getRepository(Product::class)
             ->findAll();

        return $this->render(
            'product/index.html.twig',
            ['products' => $products]
        );
    }
}