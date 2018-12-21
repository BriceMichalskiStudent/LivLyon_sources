<?php
/**
 * Created by PhpStorm.
 * User: jaldo
 * Date: 20/12/18
 * Time: 15:27
 */

namespace LIV\AppBundle\Controller;

use LIV\AppBundle\Entity\Contact;
use LIV\AppBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->get('form.factory')->create(ContactType::class, $contact);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            //create mail
            $mailUser = $this->container->getParameter('mail_user');
            //construct mail
            $notifAdmin = \Swift_Message::newInstance()
                ->setSubject($contact->getObject())
                ->setFrom($mailUser)
                ->setTo($mailUser)
                ->setContentType('text/html')
                ->setBody(
                    $this->renderView(

                    '@LIVApp/Mail/newContact.html.twig',
                        array(
                            'firstname' => $contact->getFirstname(),
                            'name' => $contact->getName(),
                            'email' => $contact->getEmail(),
                            'content' =>$contact->getMessage(),
                        )
                    )
                );
            //send mail
            $this->get('mailer')->send($notifAdmin);
            return $this->redirectToRoute('liv_app_homepage');
        }
        return $this->render('@LIVApp/Default/contact.html.twig', array(
                'form' => $form->createView()
            ));
    }
}
