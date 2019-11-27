<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
    public function showAction($slugPlace, $slugCategory)
    {
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('LIVAppBundle:Place')->findOneFullBySlug($slugPlace);

        if (!$place) {
            throw $this->createNotFoundException('The place does not exist');
        }

        return $this->render('@LIVApp/Place/single.html.twig', array(
            "place" => $place,
            "catSlug" => $slugCategory
        ));
    }

    public function showCategoryAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $category= $em->getRepository('LIVAppBundle:PlaceCategory')->findAllPlaceByCategorySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('The event does not exist');
        }


        return $this->render('@LIVApp/Categories/placesCategory.html.twig', array(
            "category" => $category
        ));
    }
}
