<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 25.03.16
 * Time: 23:08
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GenusController
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName) {
        return new Response('The genus genusname:'. $genusName);
    }
}

// testssssss