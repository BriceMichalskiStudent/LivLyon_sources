<?php
namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function showAction($slugPlace, $slugCategory)
    {
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('LIVAppBundle:Event')->findOneFullBySlug($slugPlace);
        return $this->render('@LIVApp/Place/single.html.twig', array(
            "event" => $place,
            "catSlug" => $slugCategory
        ));
    }
}