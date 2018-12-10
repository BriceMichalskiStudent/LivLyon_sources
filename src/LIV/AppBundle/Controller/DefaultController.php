<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@LIVApp/Default/index.html.twig');
    }

    public function getPlacesCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $placeCategories = $em->getRepository('LIVAppBundle:PlaceCategory')->findAll();

        return $this->render('@LIVApp/Default/places-categories-dropdown.html.twig', array(
            "placeCategories" => $placeCategories
        ));
    }
}
