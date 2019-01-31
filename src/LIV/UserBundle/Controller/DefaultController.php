<?php

namespace LIV\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LIVUserBundle:Default:index.html.twig');
    }
}
