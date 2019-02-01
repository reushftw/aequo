<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\BlogPost;
use BlogBundle\Form\BlogPostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/blogs", name="index_blog_page")
     */
    public function indexAction()
    {
        $blog_list = $this->getDoctrine()->getManager()->getRepository(BlogPost::class)->findAll();
        return $this->render('BlogBundle::listAllBlogs.html.twig', array(
            'blog_list' => $blog_list,
        ));
    }

    /**
     * @Route("/blogs/view/{id}", name="view_blog_page")
     */
    public function viewAction(Request $request, $id)
    {
        $blog = $this->getDoctrine()->getManager()->getRepository(BlogPost::class)->find($id);

        return $this->render('@Blog/addBlog.html.twig', array(
            'blog' => $blog,
        ));
    }

    /**
     * @Route("/blogs/add", name="add_blog_page")
     */
    public function addAction(Request $request)
    {
        $blog = new BlogPost();
        $form = $this->get('form.factory')->create(BlogPostType::class, $blog);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();
            return $this->redirectToRoute('index_blog_page');
        }

        return $this->render('@Blog/addBlog.html.twig', array(
           'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/blogs/edit/{id}", name="edit_blog_page")
     */
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository(BlogPost::class)->find($id);
        $form = $this->createView(BlogPostType::class,$blog);
        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('index_blog_page');
        }

        return $this->render('@Blog/editBlog.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/blogs/enable/{id}", name="toggle_blog_page")
     */
    public function toggleBlog($id)
    {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository()->find($id);
        if($blog->isEnabled())
        {
            $blog->setEnabled(false);
        }
        else{
            $blog->setEnabled(true);
        }
        $em->flush();
    }

    /**
     * @Route("/blogs/delete/{id}", name="delete_blog_page")
     */
    public function deleteBlog($id)
    {
        $em = $this->getDoctrine()->getManager();
        $blog = $em->getRepository()->find($id);
        $blog->setEnabled(false);
        $em->flush();
    }
}
