<?php

namespace My\ZabytekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WiezaController extends Controller
{
    /**
     * @Route("/wieza.html", name="url_wieza")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
