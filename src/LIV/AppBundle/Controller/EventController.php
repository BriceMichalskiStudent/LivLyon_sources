<?php
namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function showAction($slugEvent, $slugCategory)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('LIVAppBundle:Event')->findOneFullBySlug($slugEvent);

        if (!$event) {
            throw $this->createNotFoundException('The event does not exist');
        }

        return $this->render('@LIVApp/Event/single.html.twig', array(
            "event" => $event,
            "catSlug" => $slugCategory
        ));
    }

    public function showCategoryAction($slug)
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
