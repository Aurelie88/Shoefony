<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;
use AppBundle\Entity\Contact;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('app/index.html.twig');
    }

      /**
      * @Route("/presentation", name="cms_presentation")
      */
      public function presentationAction(Request $request)
      {
          // replace this example code with whatever you need
          return $this->render('app/presentation.html.twig');
      }

      /**
      * @Route("/contact", name="cms_contact")
      */
      public function contactAction(Request $request)
      {
        $contact= new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            //action a effectuer après l'envoi du formulaire
            //afficher un message flash
            $this->get('session')->getFlashBag()->add('notice',"Merci, votre message a bien été pris en compte!");
            //envoi d'un mail
            $message = \Swift_Message::newInstance()
                -> setSubject('Nouvelle demande de contact')
                -> setFrom('contact@shoefony.fr')
                -> setTo('aurelie.cuny18@gmail.com')
                -> setBody("coucou");
            $this->get('mailer')->send($message);

            //on récupère l'entity manager
            $em = $this->getDoctrine()->getManager();
            //Etape 1 : On fait persister l'entité
            $em->persist($contact);
            // etape 2 : on flush tout ce qui à été persisté avant
            $em->flush();

            return $this->redirect($this->generateUrl('cms_contact'));
        }
          // replace this example code with whatever you need

          return $this->render('app/contact.html.twig', array('form' => $form->createView()));
      }
}
