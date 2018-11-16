<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('LIVAppBundle:Place')->findOneBySlug($slug);

        return $this->render('@LIVApp/Categories/placesCategory.html.twig', array(
            "category" => $category
        ));
    }
}
