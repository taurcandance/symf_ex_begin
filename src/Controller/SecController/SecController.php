<?php


namespace App\Controller\SecController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class SecController extends AbstractController
{
    /**
     * @Route ("/sec")
     * @param LoggerInterface $logger
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sec(LoggerInterface $logger)
    {
        $logger->info('I just got the logger');
        $logger->error('An error occurred');
        $logger->critical('I left');

        return $this->render('sec/sec.html.twig', ['string' => 'Hello world2']);
    }
}