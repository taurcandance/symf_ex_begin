<?php

namespace App\Controller\ProductController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Psr\Log\LoggerInterface;
use App\Form\ProductAdd;

class ProductController extends AbstractController
{

    /**
     * @Route("/save_product", name="save_product")
     * @param Request $request
     *
     * @return Response
     */
    public function save(Request $request)
    {
        $form = $this->createForm(ProductAdd::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data          = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $product       = new Product();

            $product->setName($data['name']);
            $product->setColor($data['color']);
            $product->setHeight($data['height']);
            $product->setDescription($data['description']);

            if ($data['groundCover'] == 0) {
                $product->setGroundCover(false);
            } else {
                $product->setGroundCover(true);
            }
            if ($data['color'] == 0) {
                $product->setCut(false);
            } else {
                $product->setCut(true);
            }
            if ($data['perennialAnnual'] == 0) {
                $product->setPerennialAnnual(false);
            } else {
                $product->setPerennialAnnual(true);
            }
            if ($data['shadeLoving'] == 0) {
                $product->setShadeLoving(false);
            } else {
                $product->setShadeLoving(true);
            }
            $product->setPrice($data['price']);

            $imagePath = $this->get('request_stack')->getCurrentRequest()->getSchemeAndHttpHost().'/public/images/'.$data['imagePath'];
            $product->setImagePath($imagePath);

            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('show_all');
        }

        return $this->render('saved/saved.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/show/{id}", name="product_show")
     * @param $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        if ( ! $product) {
            throw $this->createNotFoundException('No product found for id'.$id);
        }

        return new Response(
            'This product: '.$product->getName().'<br />
        Description :'.$product->getDescription().'<br />
        Price :'.$product->getPrice().'$ <br />
        Image :<br /><img src=" '.$product->getImagePath().'" />'
        );
    }

    /**
     * @Route ("/product/update/{id}", name="edit")
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product       = $entityManager->getRepository(Product::class)->find($id);

        if ( ! $product) {
            throw $this->createNotFoundException('No found'.$id);
        }

        $product->setName('Ромашка');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', ['id' => $product->getId()]);
    }

    /**
     * @Route("/show_all", name="show_all")
     * @param LoggerInterface $logger
     *
     * @return Response
     */
    public function show_all(LoggerInterface $logger)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $products      = $entityManager->getRepository(Product::class)->findAll();

        if ( ! $products) {
            throw $this->createNotFoundException('No have repos');
        }


        $logger->info('just used a service');

        return $this->render('base.html.twig', ['products' => $products]);
    }

    /**
     * @Route ("/delete/{id}", name="delete_product")
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function delete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product       = $entityManager->getRepository(Product::class)->find($id);

        if ( ! $product) {
            throw $this->createNotFoundException('Not found product with id');
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('show_all');
    }

}
