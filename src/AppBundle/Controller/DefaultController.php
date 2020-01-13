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
     * @Route("/fr", name="homepage_nl")
     * @Route("/{_locale}/", name="homepage", requirements={"_locale" = "%app.locales%"}, defaults={"_locale":"%locale%"})
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

        $qb = $this->getDoctrine()->getManager()->getRepository(BlogPost::class)->createQueryBuilder('b');
        $blogs = $qb->where('b.enabled = true')->setMaxResults(6)->getQuery()->execute();
        //dump($blogs);

        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
            'blogs' => $blogs
        ));
    }

    /**
     * @Route("/{_locale}/news", name="newspage", requirements={"_locale" = "%app.locales%"})
     */
    public function newsAction()
    {
        $blog=$this->getDoctrine()->getManager()->getRepository(BlogPost::class)->findBy(array('enabled'=>true));

        return $this->render('default/news.html.twig', array(
            'blog' => $blog
        ));
    }

    /**
     * @Route("/{_locale}/news/{id}", name="newspage_details", requirements={"_locale" = "%app.locales%"})
     */
    public function newsDetailsAction($id)
    {
        $blog=$this->getDoctrine()->getManager()->getRepository(BlogPost::class)->findOneBy(array('id' => $id, 'enabled' => true));
        if (!$blog) {
            throw $this->createNotFoundException('This article does not exist');
        }

        return $this->render('default/article.html.twig', array(
            'b' => $blog
        ));
    }

    /**
     * @Route("/{_locale}/assistance", name="assistancepage", requirements={"_locale" = "%app.locales%"})
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
     * @Route("/{_locale}/audit", name="auditpage", requirements={"_locale" = "%app.locales%"})
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
     * @Route("/{_locale}/training", name="trainingpage", requirements={"_locale" = "%app.locales%"})
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
     * @Route("/{_locale}/laboratory", name="laboratorypage", requirements={"_locale" = "%app.locales%"})
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
     * @Route("/{_locale}/about-us", name="aboutuspage", requirements={"_locale" = "%app.locales%"})
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
