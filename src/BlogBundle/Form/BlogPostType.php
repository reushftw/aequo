<?php

namespace BlogBundle\Form;

use BlogBundle\Entity\BlogPost;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BlogPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleFr', TextType::class)
            ->add('titleEn', TextType::class)
            ->add('postDate', DateType::class, array(
                'data' => new \DateTime("now")
            ))
            ->add('descriptionFr', TextareaType::class)
            ->add('descriptionEn', TextareaType::class)
            ->add('contentFr', CKEditorType::class)
            ->add('contentEn', CKEditorType::class)
            ->add('tagFr', TextType::class)
            ->add('tagEn', TextType::class)
            ->add('imageFile', VichImageType::class, array(
                'download_link' => false,
                'required' => false,
                'allow_delete' => false,
            ))
            ->add('save',      SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => BlogPost::class,
        ));
    }
}