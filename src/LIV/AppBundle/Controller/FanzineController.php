<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 03/04/2019
 * Time: 10:15
 */

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FanzineController extends Controller
{
    public function showAllAction()
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $interviews = $em->getRepository('LIVAppBundle:Interview')->findAllWithImages();


        return $this->render('@LIVApp/Interview/showAll.html.twig', array(
            "interviews" => $interviews,
        ));
    }

    public function showOneAction($interviewSlug)
    {
        $em =  $em = $this->getDoctrine()->getManager();
        $interview = $em->getRepository('LIVAppBundle:Interview')->findOneBySlugWithImages($interviewSlug);


        return $this->render('@LIVApp/Interview/showOne.html.twig', array(
            "interview" => $interview,
        ));
    }
}
