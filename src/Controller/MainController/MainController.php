<?php

namespace App\Controller\MainController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController
{
    /**
     * @Route("/main")
     */
    public function main()
    {
        return new Response('<html><body>Hello World</body></html>');
    }
}