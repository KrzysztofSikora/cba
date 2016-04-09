<?php

namespace My\ZabytekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ZamekController extends Controller
{
    /**
     * @Route("/zamek.html", name="url_zamek")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
