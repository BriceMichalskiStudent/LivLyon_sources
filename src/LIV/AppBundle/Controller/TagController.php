<?php
/**
 * Created by PhpStorm.
 * User: Brice
 * Date: 11/12/2018
 * Time: 23:52
 */

namespace LIV\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function showAction($tagName)
    {
        $em = $this->getDoctrine()->getManager();

        $tag = $em->getRepository('LIVAppBundle:Tag')->findOneFullByTag($tagName);

        return $this->render('@LIVApp/Tag/single.html.twig', array(
            "tag" => $tag
        ));
    }
}
