<?php
/**
 * Created by PhpStorm.
 * User: krzysztof
 * Date: 25.03.16
 * Time: 23:08
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller
{
    /**
     * @Route("/genus/{genusName}")
     */
    public function showAction($genusName) {

        $notes = [
            'Octopus', ' 8 legs', 'nanana'
        ];



//        $templating = $this->container->get('templating');
//        $html = $templating->render('genus/show.html.twig', [
//            'name'=> $genusName,
//            'notes' => $notes
//        ]);
//
//        return new Response($html);

        return $this->render('genus/show.html.twig', array(
            'name' => $genusName,
            'notes' => $notes
        ));
    }
}

// testssssss