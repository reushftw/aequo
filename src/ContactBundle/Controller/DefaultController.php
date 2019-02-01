<?php

namespace ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/co", name="list_contact_page")
     */
    public function indexAction()
    {
        return $this->render('ContactBundle:Default:index.html.twig');
    }
}
