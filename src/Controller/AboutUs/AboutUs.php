<?php

namespace App\Controller\AboutUs;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AboutUs extends AbstractController
{
    /**
     *
     * @Route ("/about-us", name = "about_us")
     */
    public function show()
    {
        return $this->render('about/about.html.twig');
    }
}