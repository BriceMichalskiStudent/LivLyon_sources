<?php
namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function showAction($slugEvent, $slugCategory)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('LIVAppBundle:Event')->findOneFullBySlug($slugEvent);
        return $this->render('@LIVApp/Event/single.html.twig', array(
            "event" => $event,
            "catSlug" => $slugCategory
        ));
    }
}