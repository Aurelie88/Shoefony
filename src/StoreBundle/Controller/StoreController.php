<?php

namespace StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class StoreController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('store/index.html.twig');
    }

    /**
     * @Route("/products", name="cms_product")
     */
    public function productsAction()
    {
        $products="produits";
        $em=$this->getDoctrine()->getManager();
        $products = $em->getRepository('StoreBundle:Product')->findAll();
        return $this->render('store/products.html.twig', array(
            'products' => $products
        ));
    }


     /**
     * @Route("/product/{id}/details/{slug}/", requirements={"id"="\d+"}, name="store_product")
     */
     public function detailAction($id,  Request $request)
     {
        $slug = $request->get('slug');
        $ipAdress = $request->getClientIp();
         return $this->render('store/product.html.twig', array(
            'id' => $id,
            'slug' => $slug,
            'ip' => $ipAdress
         ));
     }

}
