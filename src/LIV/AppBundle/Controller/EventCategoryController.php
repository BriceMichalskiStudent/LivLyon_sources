<?php

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventCategoryController extends Controller
{
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('LIVAppBundle:EventCategory')->findAllEventByCategorySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('The event does not exist');
        }

        return $this->render('@LIVApp/Categories/eventsCategory.html.twig', array(
            "category" => $category
        ));
    }
}
