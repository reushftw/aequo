<?php

namespace IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index_admin_page")
     */
    public function indexAction()
    {
        return $this->render('IndexBundle:Default:index.html.twig');
    }
}
