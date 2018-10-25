<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@LIVApp/Default/index.html.twig');
    }
}
