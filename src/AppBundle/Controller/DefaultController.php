<?php

namespace AppBundle\Controller;

use BlogBundle\Entity\BlogPost;
use ContactBundle\Entity\Message;
use ContactBundle\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/news", name="newspage")
     */
    public function newsAction(Request $request)
    {
        $blog=$this->getDoctrine()->getManager()->getRepository(BlogPost::class)->findBy(array('enabled'=>true));

        return $this->render('default/news.html.twig', array(
            'blog' => $blog
        ));
    }

    /**
     * @Route("/assistance", name="assistancepage")
     */
    public function assistanceAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/assistance.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/audit", name="auditpage")
     */
    public function auditAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/audit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/training", name="trainingpage")
     */
    public function trainingAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/training.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/laboratory", name="laboratorypage")
     */
    public function laboratoryAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/laboratory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/aboutus", name="aboutuspage")
     */
    public function aboutusAction(Request $request)
    {
        $message = new Message();
        $message->setEnabled(true);
        $form = $this->get('form.factory')->create(MessageType::class, $message);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('default/aboutus.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
