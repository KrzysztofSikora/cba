<?php

namespace My\ZabytekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BramaController extends Controller
{
    /**
     * @Route("/brama.html", name="url_brama")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
