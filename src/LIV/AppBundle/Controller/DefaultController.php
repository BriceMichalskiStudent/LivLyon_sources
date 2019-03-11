<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sponsoredPlace = $em->getRepository('LIVAppBundle:Place')->findLastWithImage();

        return $this->render('@LIVApp/Default/index.html.twig', array(
            "sponsoredPlace" => $sponsoredPlace
        ));
    }

    public function getPlacesCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $placeCategories = $em->getRepository('LIVAppBundle:PlaceCategory')->findAll();

        return $this->render('@LIVApp/Default/places-categories-dropdown.html.twig', array(
            "placeCategories" => $placeCategories
        ));
    }

    public function getEventsCategories()
    {
        $em = $this->getDoctrine()->getManager();
        $eventCategories = $em->getRepository('LIVAppBundle:EventCategory')->findAll();

        return $this->render('@LIVApp/Default/events-categories-dropdown.html.twig', array(
            "eventCategories" => $eventCategories
        ));
    }
  
   public function aroundMeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $places = $em->getRepository('LIVAppBundle:Place')->findAll();

        return $this->render('@LIVApp/Default/around-me.html.twig', array(
            "places" => $places
        ));

    }
  
    public function quiSommesNousAction()
    {
        return $this->render('@LIVApp/Default/qui-sommes-nous.html.twig');
    }
}
