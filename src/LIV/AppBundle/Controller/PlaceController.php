<?php

namespace LIV\AppBundle\Controller;


use LIV\AppBundle\LIVAppBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use LIV\AppBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{

    public function showAction(Place $place){

        $data = $this->get('jms_serializer')->serialize($place,'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    public function createAction(Request $request){
        $data = $request->getContent();
        $place = $this->get('jms_serializer')->deserialize($data,'LIV\AppBundle\Entity\Place','json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }

    public function listAction($limit){

        $places = $this->getDoctrine()->getManager()->getRepository("LIVAppBundle:Place")->findBy(array(),array("updatedAt"=>"desc"),$limit,null);
        $data = $this->get('jms_serializer')->serialize($places,'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}