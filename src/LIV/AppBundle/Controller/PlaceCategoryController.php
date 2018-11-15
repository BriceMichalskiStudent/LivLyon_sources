<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceCategoryController extends Controller
{
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $placeList = $em->getRepository('LIVAppBundle:PlaceCategory')->findAllPlaceByCategorySlug($slug);

        return $this->render('@LIVApp/Categories/placesCategory.html.twig',array(
            "places" => $placeList
        ));
    }
}