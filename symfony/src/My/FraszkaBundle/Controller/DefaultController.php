<?php

namespace My\FraszkaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/do-goscia.html", name="url_dogoscia")
     * @Template()
     */
    public function dogosciaAction()
    {
        return array();
    }

    /**
     * @Route("/na-swoje-ksiegi.html", name="url_naswojeksiegi")
     * @Template()
     */
    public function naswojeksiegiAction()
    {
        return array();
    }

    /**
     * @Route("/o-zywocie-ludzkim.html", name="url_ozywocieludzkim")
     * @Template()
     */
    public function ozywocieludzkimAction()
    {
        return array();
    }
}
